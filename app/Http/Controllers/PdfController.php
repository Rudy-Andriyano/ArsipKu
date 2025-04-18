<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
// use App\Models\kearsipan;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function generatePdf($id)
{
    // Ambil data peminjaman dan relasi pegawai & arsip
    $peminjam = Peminjaman::with(['pegawai'])->findOrFail($id);

    // Absolute path for Dompdf compatibility
    $imagePath = public_path('storage/assets/image.png');

    $data = compact('peminjam', 'imagePath');

    $pdf = PDF::loadView('pdf.formulir_peminjaman', $data);
    return $pdf->download('formulir_peminjaman_'.$peminjam->id.'.pdf');
}



}