<?php


namespace App\Http\Controllers;

use App\Exports\AllDataExport;
use App\Imports\AllDataImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;



class BackupRestoreController extends Controller
{
    
    
    public function backup()
    {
        try {
            // Generate SQL backup
            $sqlFileName = $this->generateSqlBackup();
            
            // Check if SQL file was created successfully
            if (!Storage::disk('local')->exists($sqlFileName)) {
                throw new \Exception("SQL backup file was not created properly");
            }
            
            // Get the absolute path to the SQL file
            $sqlFilePath = Storage::disk('local')->path($sqlFileName);
            
            // Generate Excel backup
            $excelFileName = 'all_data_backup_' . date('Y_m_d_H_i_s') . '.xlsx';
            Excel::store(new AllDataExport, $excelFileName, 'local');
            
            // Check if Excel file was created successfully
            if (!Storage::disk('local')->exists($excelFileName)) {
                throw new \Exception("Excel backup file was not created properly");
            }
            
            // Get the absolute path to the Excel file
            $excelFilePath = Storage::disk('local')->path($excelFileName);
            
            // Debug logging
            Log::info("SQL file path: " . $sqlFilePath);
            Log::info("Excel file path: " . $excelFilePath);
            
            // Create a zip file containing both backups
            $zipFileName = 'backup_' . date('Y_m_d_H_i_s') . '.zip';
            $zipPath = Storage::disk('local')->path($zipFileName);
            
            $zip = new \ZipArchive();
            if ($zip->open($zipPath, \ZipArchive::CREATE) === TRUE) {
                // Add SQL file to zip
                if (!$zip->addFile($sqlFilePath, $sqlFileName)) {
                    throw new \Exception("Failed to add SQL file to zip archive. File path: $sqlFilePath");
                }
                
                // Add Excel file to zip
                if (!$zip->addFile($excelFilePath, $excelFileName)) {
                    throw new \Exception("Failed to add Excel file to zip archive. File path: $excelFilePath");
                }
                
                $zip->close();
                
                // Delete the individual files after zipping
                Storage::disk('local')->delete([$sqlFileName, $excelFileName]);
                
                // Download the zip file
                return response()->download($zipPath)->deleteFileAfterSend(true);
            }
            
            return back()->with('error', 'Failed to create backup archive.');
        } catch (\Exception $e) {
            // Log error for debugging
            Log::error('Backup failed: ' . $e->getMessage());
            return back()->with('error', 'Backup failed: ' . $e->getMessage());
        }
    }
    
    /**
     * Generate SQL backup file
     * 
     * @return string The SQL file name
     */
    private function generateSqlBackup()
    {
        $dbName = env('DB_DATABASE');
        $tables = DB::select('SHOW TABLES');
        $sqlContent = '';
    
        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0];
    
            // Drop table if exists
            $sqlContent .= "DROP TABLE IF EXISTS `$tableName`;\n";
    
            // Create table structure
            $createTable = DB::select("SHOW CREATE TABLE `$tableName`")[0]->{'Create Table'};
            $sqlContent .= $createTable . ";\n\n";
    
            // Insert data
            $rows = DB::table($tableName)->get();
            foreach ($rows as $row) {
                $columns = array_map(function ($col) { return "`$col`"; }, array_keys((array)$row));
                $values = array_map(function ($val) { 
                    if (is_null($val)) {
                        return 'NULL';
                    } else {
                        return "'" . addslashes($val) . "'";
                    }
                }, array_values((array)$row));
    
                $sqlContent .= "INSERT INTO `$tableName` (" . implode(", ", $columns) . ") VALUES (" . implode(", ", $values) . ");\n";
            }
    
            $sqlContent .= "\n";
        }
    
        $sqlFileName = 'backup_' . date('Y_m_d_H_i_s') . '.sql';
        
        // Store the SQL file and verify it was saved successfully
        if (!Storage::disk('local')->put($sqlFileName, $sqlContent)) {
            throw new \Exception("Failed to write SQL backup file");
        }
        
        Log::info("SQL backup file created: " . $sqlFileName);
        
        return $sqlFileName;
    }

    


    public function restore(Request $request)
    {
        try {
            // Validate uploaded file
            $request->validate([
                'file' => 'required|file|mimetypes:application/sql,text/plain,application/octet-stream|max:10240|extensions:sql',
            ]);

            // Get the uploaded file
            $uploadedFile = $request->file('file');

            // Ensure temp directory exists
            $tempDir = storage_path('app/temp');
            if (!File::exists($tempDir)) {
                File::makeDirectory($tempDir, 0755, true);
            }

            // Define storage path with original extension
            $originalName = $uploadedFile->getClientOriginalName();
            $fileName = uniqid() . '_' . $originalName;
            $fullPath = storage_path('app/temp/' . $fileName);

            // Store the file
            $uploadedFile->move($tempDir, $fileName);
            Log::info('File stored', ['path' => $fullPath, 'exists' => file_exists($fullPath)]);

            // Verify file exists
            if (!file_exists($fullPath)) {
                throw new \Exception('Failed to store the uploaded file.');
            }

            // Read SQL file
            $sqlContent = file_get_contents($fullPath);
            if ($sqlContent === false) {
                throw new \Exception('Failed to read the uploaded file.');
            }
            if (empty($sqlContent)) {
                throw new \Exception('The SQL file is empty.');
            }

            // Begin transaction
            DB::beginTransaction();

            // Set charset and disable foreign key checks
            DB::statement('SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci;');
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            // Split and execute SQL statements
            $statements = array_filter(array_map('trim', explode(';', $sqlContent)));
            foreach ($statements as $statement) {
                if (!empty($statement)) {
                    DB::statement($statement);
                }
            }

            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            // Commit transaction
            DB::commit();

            // Clean up
            File::delete($fullPath);

            return back()->with('success', 'Database restored successfully.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::warning('Validation failed', ['errors' => $e->errors()]);
            return back()->with('error', 'Invalid file. Please upload a valid .sql file (max 10MB).');
        } catch (\Illuminate\Database\QueryException $e) {
            DB::rollBack();
            File::delete($fullPath ?? '');
            $error = strpos($e->getMessage(), 'Duplicate entry') !== false
                ? 'Duplicate data detected. Clear the database first.'
                : 'Database error: ' . $e->getMessage();
            Log::error('Database error', ['error' => $error]);
            return back()->with('error', $error);
        } catch (\Exception $e) {
            DB::rollBack();
            File::delete($fullPath ?? '');
            Log::error('Restore failed', ['error' => $e->getMessage()]);
            return back()->with('error', 'Failed to restore: ' . $e->getMessage());
        }
    }
    }
