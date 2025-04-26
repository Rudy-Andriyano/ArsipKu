<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SimpleSheetExport implements FromCollection, WithTitle, WithHeadings
{
    protected $data;
    protected $title;

    public function __construct($data, $title)
    {
        $this->data = $data;
        $this->title = $title;
    }
    public function backup()
    {
        $timestamp = now()->format('Y_m_d_H_i_s');
        $folder = storage_path("app/backups/{$timestamp}");

        File::makeDirectory($folder, 0755, true);

        // Ambil konfigurasi database dari .env
        $database = config('database.connections.mysql.database');
        $username = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');
        $host = config('database.connections.mysql.host');
        $port = config('database.connections.mysql.port');

        $dumpPath = "{$folder}/backup_{$timestamp}.sql";

        // Jalankan mysqldump
        $command = "mysqldump --user={$username} --password={$password} --host={$host} --port={$port} {$database} > {$dumpPath}";
        system($command);

        // Download hasil backup
        return response()->download($dumpPath)->deleteFileAfterSend(true);
    }

    public function collection()
    {
        return $this->data->map(function ($item) {
            $array = is_object($item) ? $item->toArray() : (array) $item;

            // Peminjaman Sheet: Ganti pegawai_id & kearsipan_id dengan nama
            if ($this->title == 'Peminjamen') {
                $array['pegawai_nama'] = $item->pegawai->nama_pegawai ?? null;
                $array['kearsipan_nama'] = $item->kearsipan->nama ?? null;

                unset($array['pegawai_id'], $array['kearsipan_id']);
                
                // Susun urutan baru
                $newOrder = [
                    'id', 'pegawai_nama', 'kearsipan_nama', 'arsip_pinjam', 'perihal', 
                    'bukti_peminjaman', 'bukti_pengembalian', 'tanggal_pinjam', 'tanggal_kembali', 
                    'status', 'created_at', 'updated_at'
                ];

                $array = $this->reorderArray($array, $newOrder);
            }

            // Pengingats Sheet: Tambahkan nama peminjaman
            if ($this->title == 'Pengingats') {
                $array['peminjaman_nama'] = $item->peminjaman->arsip_pinjam ?? null;
                
                // Susun ulang supaya peminjaman_nama muncul setelah peminjaman_id
                $newOrder = [
                    'id', 'peminjaman_id', 'peminjaman_nama', 'tenggat', 'created_at', 'updated_at'
                ];

                $array = $this->reorderArray($array, $newOrder);
            }

            return $array;
        });
    }

    public function title(): string
    {
        return $this->title;
    }

    public function headings(): array
    {
        if ($this->data->isEmpty()) {
            return [];
        }

        $first = $this->data->first();
        $array = is_object($first) ? $first->toArray() : (array) $first;

        if ($this->title == 'Peminjamen') {
            $fields = [
                'id', 'pegawai_nama', 'kearsipan_nama', 'arsip_pinjam', 'perihal', 
                'bukti_peminjaman', 'bukti_pengembalian', 'tanggal_pinjam', 'tanggal_kembali', 
                'status', 'created_at', 'updated_at'
            ];
        } elseif ($this->title == 'Pengingats') {
            $fields = [
                'id', 'peminjaman_id', 'peminjaman_nama', 'tenggat', 'created_at', 'updated_at'
            ];
        } else {
            $fields = array_keys($array);
        }

        return $fields;
    }
    

    private function reorderArray(array $array, array $order)
    {
        $new = [];
        foreach ($order as $key) {
            $new[$key] = $array[$key] ?? null;
        }
        return $new;
    }
}
