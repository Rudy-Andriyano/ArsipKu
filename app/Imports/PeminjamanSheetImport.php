<?php

namespace App\Imports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PeminjamanSheetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Peminjaman([
            'pegawai_id' => $row['pegawai_id'],
            'kearsipan_id' => $row['kearsipan_id'],
            'arsip_pinjam' => $row['arsip_pinjam'],
            'perihal' => $row['perihal'],
            'bukti_peminjaman' => $row['bukti_peminjaman'],
            'bukti_pengembalian' => $row['bukti_pengembalian'], // nullable
            'tanggal_pinjam' => $this->transformDate($row['tanggal_pinjam']),
            'tanggal_kembali' => $this->transformDate($row['tanggal_kembali']), // nullable
            'status' => $row['status'],
        ]);
    }

    private function transformDate($value)
    {
        try {
            if (is_numeric($value)) {
                return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('Y-m-d');
            }
            return \Carbon\Carbon::parse($value)->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
