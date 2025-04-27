<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $search = $request->input('search');        // The keyword entered by the user
    $category = $request->input('category');    // The selected category (e.g., 'nama_pegawai' or 'nip')

    // Initialize query
    $pegawais = Pegawai::query();

    // Apply filter if search term and category are provided
    if ($search && $category) {
        if (in_array($category, ['nama_pegawai', 'nip'])) {
            $pegawais->where($category, 'like', "%$search%");
        }
    }

    // Fetch the filtered or complete data
    $pegawais = $pegawais->get();

    // Return the view with data
    return view('pegawai.index', compact('pegawais', 'search', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
        ]);

        Pegawai::create($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data berhasil ditambahkan!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Pegawai $pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pegawai $pegawai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pegawai $pegawai)
{
    try {
        $request->validate([
            'nama_pegawai' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'unit_kerja' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
        ]);

        $pegawai->update($request->all());
        return redirect()->route('pegawai.index')->with('success', 'Data berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pegawai $pegawai)
{
    try {
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with('success', 'Data Pegawai berhasil dihapus.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
public function updateStatus($id)
    {
        // Ambil data peminjaman berdasarkan ID
        $pegawai = Pegawai::findOrFail($id);
    
        // Langsung ubah status menjadi 'dikembalikan'
        if ($pegawai->status != 'IN-AKTIF') {
            $pegawai->status = 'IN-AKTIF';
            
        } elseif ($pegawai->status != 'AKTIF'){
            $pegawai->status = 'AKTIF';
        }
    
    
        // Simpan perubahan ke database
        $pegawai->save();
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'status telah di perbarui!');
    }


}
