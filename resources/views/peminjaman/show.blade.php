@extends('layouts.sidebar')

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Form /</span> Detail Peminjaman</h4>
<div class="row">
  <!-- Form Controls -->
  <div class="col-md-10">
    <div class="card mb-4">
      <div class="card-body">
        <form method="POST" action="{{ route('peminjaman.update', $peminjaman->id) }}" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
            <label for="pegawai_id" class="form-label">Nama peminjam</label>
            <select class="form-select" name="pegawai_id" id="pegawai_id" disabled>
              <option value="" disabled>Pilih Nama Pegawai</option>
              @foreach($pegawais as $pegawai)
                <option value="{{ $pegawai->id }}" {{ $peminjaman->pegawai_id == $pegawai->id ? 'selected' : '' }}>
                  {{ $pegawai->nama_pegawai }}
                </option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label for="kearsipan_id" class="form-label">Penanggung Jawab</label>
            <select class="form-select" name="kearsipan_id" id="kearsipan_id" disabled>
              <option value="" disabled>Pilih Penanggung Jawab</option>
              @foreach($kearsipans as $kearsipan)
                <option value="{{ $kearsipan->id }}" {{ $peminjaman->kearsipan_id == $kearsipan->id ? 'selected' : '' }} >
                  {{ $kearsipan->nama }} -> {{ $kearsipan->jabatan }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <label class="form-label">Tanggal Pinjam</label>
            <input class="form-control shadow-sm rounded-3 border-primary" type="date" name="tanggal_pinjam" value="{{ $peminjaman->tanggal_pinjam }}" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Bukti Peminjaman</label>
            <img src="{{asset('storage/'.$peminjaman->bukti_peminjaman)}}" alt="" style="width:300px; aspect-ration:1/1; object-fit:cover;">
          </div>
          <div class="mb-3">
            <label class="form-label">Bukti Pengembalian</label>
            <img src="{{asset('storage/'.$peminjaman->bukti_pengembalian)}}" alt="Belum ada pengembalian" style="width:300px; aspect-ration:1/1; object-fit:cover;">
          </div>
         

          <div class="mb-3">
            <label class="form-label">Perihal layanan</label>
            <input type="text" name="perihal" class="form-control" value="{{ $peminjaman->perihal }}" readonly>
          </div>
          <div class="mb-3">
            <label class="form-label">Arsip yang Dipinjam</label>
            <input type="text" name="arsip_pinjam" class="form-control" value="{{ $peminjaman->arsip_pinjam }}"readonly>
          </div>

         
          <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">Balik</a>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection