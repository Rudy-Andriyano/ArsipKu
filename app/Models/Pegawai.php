<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $fillable =['nama_pegawai','nip','nomor_hp','jenis_kelamin','jabatan','unit_kerja'];

    
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
