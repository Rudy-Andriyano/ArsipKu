<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengingat extends Model
{
    //
    protected $fillable =['peminjaman_id','tenggat'];

    public function peminjamen(){
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

}


