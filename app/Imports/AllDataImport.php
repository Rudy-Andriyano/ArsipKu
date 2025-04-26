<?php

namespace App\Imports;

use App\Models\Pegawai;
use App\Models\Peminjaman;
use App\Models\Kearsipan;
use App\Models\Pengingat;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\ToModel;

class AllDataImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Pegawais' => new PegawaiSheetImport(),
            'Peminjamen' => new PeminjamanSheetImport(),
            'Kearsipans' => new KearsipanSheetImport(),
            'Pengingats' => new PengingatSheetImport(),
        ];
    }
}
