<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\kearsipanController;
use App\Http\Controllers\BackupRestoreController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');


Route::middleware(['auth'])->group(function () {
    Route::get('/backup', [BackupRestoreController::class, 'backup'])->name('backup');
    Route::post('/restore', [BackupRestoreController::class, 'restore'])->name('restore');
    Route::patch('/peminjaman/{id}/tambah-hari', [PeminjamanController::class, 'tambahHari'])->name('peminjaman.tambahHari');
    

    Route::resource('pegawai', PegawaiController::class);
    
    Route::resource('peminjaman', PeminjamanController::class);
    Route::get('peminjaman/{peminjaman}/pengembalian', [PeminjamanController::class, 'pengembalian'])->name('peminjaman.pengembalian');
    Route::put('peminjaman/{peminjaman}/process-pengembalian', [PeminjamanController::class, 'processPengembalian'])
    ->name('peminjaman.processPengembalian');
    
    Route::resource('kearsipan', KearsipanController::class);

    Route::get('/', function () {
        return redirect()->route('peminjaman.index');
    });

    Route::patch('/peminjaman/{id}/status', [PeminjamanController::class, 'updateStatus'])->name('peminjaman.updateStatus');
    //untuk mengubah status pegawai
    Route::patch('/pegawai/{id}/status', [PegawaiController::class, 'updateStatus'])->name('pegawai.updateStatus');
    
    //untuk mengubah status penanggung jawab
    Route::patch('/kearsipan/{id}/status', [KearsipanController::class, 'updateStatus'])->name('kearsipan.updateStatus');
    Route::get('/generate-pdf/{id}', [PdfController::class, 'generatePdf'])->name('generate.pdf');
    Route::get('/logo', function () {
        $path = asset('storage/assets/image.png');
        return response()->json([
            'description' => 'This is the logo of the application.',
            'path' => $path
        ]);
    });
});