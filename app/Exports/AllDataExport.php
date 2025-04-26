<?php

namespace App\Exports;

use App\Models\Pegawai;
use App\Models\Peminjaman;
use App\Models\Kearsipan;
use App\Models\Pengingat;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class AllDataExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
    new SimpleSheetExport(\App\Models\Pegawai::all(), 'Pegawais'),
    new SimpleSheetExport(\App\Models\Peminjaman::all(), 'Peminjamen'),
    new SimpleSheetExport(\App\Models\Kearsipan::all(), 'Kearsipans'),
    new SimpleSheetExport(\App\Models\Pengingat::all(), 'Pengingats'),
];

    }
}
