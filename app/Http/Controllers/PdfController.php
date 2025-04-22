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
    // Absolute path to the image (use the correct path to the public folder)
    $imagePath = public_path('storage/assets/image.png');  // Assuming the image is in the "storage" folder

    // Fetch the data for peminjaman and related data
    $peminjam = Peminjaman::with(['pegawai'])->findOrFail($id);

    // Pass the data to the view
    $data = compact('peminjam', 'imagePath');

    // Render the view
    $view = view('pdf.formulir_peminjaman', ['logoSrc' => $imagePath, 'peminjam' => $peminjam])->render();

    // Generate the PDF
    $pdf = PDF::loadHTML($view);

    return $pdf->download('formulir_peminjaman_' . $peminjam->id . '.pdf');
}




}