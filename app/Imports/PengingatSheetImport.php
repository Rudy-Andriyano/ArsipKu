<?php

namespace App\Imports;

use App\Models\Pengingat;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PengingatSheetImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Pengingat([
            'peminjaman_id' => $row['peminjaman_id'],
            'tenggat' => $this->transformDate($row['tenggat']),
        ]);
    }

    private function transformDate($value)
    {
        try {
            return \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('Y-m-d');
        } catch (\ErrorException $e) {
            return $value;
        }
    }
}
