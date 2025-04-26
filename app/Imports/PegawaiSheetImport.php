<?php

namespace App\Imports;

use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PegawaiSheetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Pegawai([
            'nama_pegawai' => $row['nama_pegawai'],
            'status' => $row['status'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nip' => $row['nip'],
            'jabatan' => $row['jabatan'],
            'unit_kerja' => $row['unit_kerja'],
            'nomor_hp' => $row['nomor_hp'],
        ]);
    }
}
