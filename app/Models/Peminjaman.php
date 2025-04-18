<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = ['pegawai_id', 'kearsipan_id','perihal','arsip_pinjam', 'tanggal_pinjam', 'tanggal_kembali','status'];

    // Setiap peminjaman hanya memiliki satu arsip
    public function pengingat()
{
    return $this->hasOne(Pengingat::class);
}
    public function kearsipan()
    {
        return $this->belongsTo(Kearsipan::class, 'kearsipan_id');
    }

    // Setiap peminjaman hanya dilakukan oleh satu pegawai
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}

