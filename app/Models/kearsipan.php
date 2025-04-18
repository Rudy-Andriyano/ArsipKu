<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kearsipan extends Model
{
    //
    protected $fillable =['nama','nip','nomor_hp','jenis_kelamin','jabatan'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
