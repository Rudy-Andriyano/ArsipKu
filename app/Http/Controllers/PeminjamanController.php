<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Peminjaman;
use App\Models\Pengingat;
use App\Models\kearsipan;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */


public function index(Request $request)
{
    //Cek arsip yang sudah melewati tenggat tapi belum dikembalikan
    $peminjamanTerlambat = Peminjaman::where('status', 'dipinjam')
        ->whereHas('pengingat', function ($query) {
            $query->where('tenggat', '<', now());
        })
        ->with('pegawai')
        ->get();

    if ($peminjamanTerlambat->count() > 0) {
        foreach ($peminjamanTerlambat as $item) {
            $arsip = $item->arsip_pinjam;
            $arsip = $item->tanggal_pinjam;
            $pegawai = $item->pegawai->nama_pegawai ?? 'Tidak diketahui';
            $daftarArsipTerlambat[] = "$arsip (atas nama: $pegawai)";
        }
        $daftarArsipTerlambatStr = implode('<br> ', $daftarArsipTerlambat);

        session()->flash('warning', '<strong> Arsip berikut terlambat dan belum dikembalikan:</strong> <br>' . $daftarArsipTerlambatStr.'</br>');
    }

    // Filter dan pencarian
    $search = $request->input('search');
    $category = $request->input('category');
    $peminjamans = Peminjaman::query();

    if ($search && $category) {
        if (in_array($category, ['arsip_pinjam', 'perihal', 'status'])) {
            $peminjamans->where($category, 'like', "%$search%");
        }
    }

    $peminjamans = $peminjamans->orderBy('status', 'asc')->get();
    $belumDikembalikan = Peminjaman::where('status', 'dipinjam')->count();

    return view('peminjaman.index', compact('peminjamans', 'belumDikembalikan', 'search', 'category'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kearsipans = kearsipan::all(); // Ambil semua arsip dari database
        $pegawais = Pegawai::all(); // Ambil semua arsip dari database
        return view('peminjaman.create', compact('kearsipans','pegawais'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $request->validate([
        'pegawai_id' => 'required|exists:pegawais,id',
        'kearsipan_id' => 'required|exists:kearsipans,id',
        'perihal' => 'required|string|max:255',
        'photo' => 'required|image|max:2048',
        'arsip_pinjam' => 'required|string|max:255',
        
        ]);
        $photo = $request->file('photo');
        $path = $photo->store('photos','public');
        

        $peminjaman =Peminjaman::create([
            'pegawai_id' => $request->pegawai_id,
            'kearsipan_id' => $request->kearsipan_id,
            'perihal' => $request->perihal,
            'arsip_pinjam' => $request->arsip_pinjam,
            'bukti_peminjaman' => $path,
            'tanggal_pinjam' => now(),
        ]);

      
        Pengingat::create([
            'peminjaman_id'=> $peminjaman->id,
            'tenggat' => Carbon::now()->addDays(3)
        ]);
       
        return redirect()->route('peminjaman.index')->with('success','Peminjaman sudah di buat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peminjaman $peminjaman)
    {
        //
        $peminjaman = Peminjaman::findOrFail($peminjaman->id);
        $kearsipans = kearsipan::all(); // Ambil semua arsip dari database
        $pegawais = Pegawai::all(); // Ambil semua arsip dari database
        return view('peminjaman.show', compact('peminjaman', 'pegawais', 'kearsipans'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peminjaman $peminjaman)
    {
        //
        $peminjaman = Peminjaman::findOrFail($peminjaman->id);
        $kearsipans = kearsipan::all(); // Ambil semua arsip dari database
        $pegawais = Pegawai::all(); // Ambil semua arsip dari database
        return view('peminjaman.edit', compact('peminjaman', 'pegawais', 'kearsipans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
        $request->validate([
            'pegawai_id' => 'required|exists:pegawais,id',
            'kearsipan_id' => 'required|exists:kearsipans,id',
            'perihal' => 'required|string|max:255',
            'arsip_pinjam' => 'required|string|max:255',
            'tanggal_pinjam' =>'required|date'
            ]);
            
            $peminjaman->update([
                'pegawai_id' => $request->pegawai_id,
                'kearsipan_id' => $request->kearsipan_id,
                'perihal' => $request->perihal,
                'arsip_pinjam' => $request->arsip_pinjam,
                'tanggal_pinjam' => $request->tanggal_pinjam,
            ]);
           


            $pengingat = Pengingat::where('peminjaman_id', $peminjaman->id)->first();
            if ($pengingat) {
                $pengingat->update([
                    'tenggat' => Carbon::parse($request->tanggal_pinjam)->addDays(3)
                ]);
            }
            return redirect()->route('peminjaman.index')->with('success','data sudah di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
        if ($peminjaman->status != 'dipinjam') {
            return redirect()->back()->with('error', 'Data tidak bisa dihapus karena status sudah dikembalikan!');
        }
    
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')->with('success', 'Data berhasil dihapus!');
    }
    public function pengembalian(Peminjaman $peminjaman)
{
    $peminjaman = Peminjaman::findOrFail($peminjaman->id);
    $kearsipans = kearsipan::all(); // Ambil semua arsip dari database
    $pegawais = Pegawai::all(); // Ambil semua arsip dari database
    return view('peminjaman.pengembalian', compact('peminjaman', 'pegawais', 'kearsipans'));
}
    public function processPengembalian(Request $request, Peminjaman $peminjaman)
    {
        //
        $request->validate([
            
            'photo' => 'required|image|max:2048',

            ]);
            $photo = $request->file('photo');
            $path = $photo->store('photos','public');

            $peminjaman->update([
                
                'bukti_pengembalian'=>$path,

            ]);

            $this->updateStatusInternal($peminjaman);

            return redirect()->route('peminjaman.index')->with('success','data sudah di perbarui');
    }
    protected function updateStatusInternal(Peminjaman $peminjaman)
{
    // Update status logic
    if ($peminjaman->status != 'dikembalikan') {
        $peminjaman->status = 'dikembalikan';
        $peminjaman->tanggal_kembali = now();
        $peminjaman->save();
    }
}

// Keep the original public method for direct route access
public function updateStatus($id)
{
    $peminjaman = Peminjaman::findOrFail($id);
    $this->updateStatusInternal($peminjaman);
    return redirect()->back()->with('success', 'Arsip berhasil dikembalikan!');
}
    
    }
