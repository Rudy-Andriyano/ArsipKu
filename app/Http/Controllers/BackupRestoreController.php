<?php

namespace App\Http\Controllers;

use App\Exports\AllDataExport;
use App\Imports\AllDataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class BackupRestoreController extends Controller
{
    public function backup()
    {
        return Excel::download(new AllDataExport, 'all_data_backup.xlsx');
    }

    public function restore(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx',
        ]);

        Excel::import(new AllDataImport, $request->file('file'));

        return back()->with('success', 'All data restored successfully.');
    }
}
