<?php

namespace App\Http\Controllers;

use App\Models\kearsipan;
use Illuminate\Http\Request;

class KearsipanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request)
    {
        //
        $search = $request->input('search');        // The keyword entered by the user
    $category = $request->input('category');    // The selected category (e.g., 'nama_pegawai' or 'nip')

    // Initialize query
    $kearsipans = Kearsipan::query();

    // Apply filter if search term and category are provided
    if ($search && $category) {
        if (in_array($category, ['nama', 'nip'])) {
            $kearsipans->where($category, 'like', "%$search%");
        }
    }

    // Fetch the filtered or complete data
    $kearsipans = $kearsipans->get();

    // Return the view with data
    return view('kearsipan.index', compact('kearsipans', 'search', 'category'));

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
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
        ]);

        kearsipan::create($request->all());
        return redirect()->route('kearsipan.index')->with('success', 'Data berhasil ditambahkan!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    /**
     * Display the specified resource.
     */
    public function show(kearsipan $kearsipan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kearsipan $kearsipan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kearsipan $kearsipan)
{
    try {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'nomor_hp' => 'required|string|max:255',
        ]);

        $kearsipan->update($request->all());
        return redirect()->route('kearsipan.index')->with('success', 'Status berhasil diperbarui!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kearsipan $kearsipan)
{
    try {
        $kearsipan->delete();
        return redirect()->route('kearsipan.index')->with('success', 'Status berhasil dihapus!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}
    public function updateStatus($id)
    {
        // Ambil data peminjaman berdasarkan ID
        $kearsipan = kearsipan::findOrFail($id);
    
        // Langsung ubah status menjadi 'dikembalikan'
        if ($kearsipan->status != 'IN-AKTIF') {
            $kearsipan->status = 'IN-AKTIF';
            
        } elseif ($kearsipan->status != 'AKTIF'){
            $kearsipan->status = 'AKTIF';
        }
    
    
        // Simpan perubahan ke database
        $kearsipan->save();
    
        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'status telah di perbarui!');
    }
}
