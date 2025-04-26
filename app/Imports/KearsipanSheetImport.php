<?php

namespace App\Imports;

use App\Models\Kearsipan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KearsipanSheetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Kearsipan([
            'nama' => $row['nama'],
            'status' => $row['status'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nip' => $row['nip'],
            'jabatan' => $row['jabatan'],
            'nomor_hp' => $row['nomor_hp'],
        ]);
    }
}
