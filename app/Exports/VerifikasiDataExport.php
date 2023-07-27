<?php

namespace App\Exports;

use App\Models\Verifikasi;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VerifikasiDataExport implements FromCollection, WithHeadings
{
   public function collection()
    {
        $verifikasi = Verifikasi::with('siswa')->where('status', 'lulus')->get();

        return $verifikasi->map(function ($item) {
            return [
                'Nama' => $item->siswa->name,
                'NISN' => $item->siswa->nisn,
                'Nomor Pendaftaran' => $item->nomor_pendaftaran,
                'Tanggal Daftar' => $item->tanggal_daftar,
                'NIK' => $item->siswa->nik,
                'Status' => $item->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NISN',
            'Nomor Pendaftaran',
            'Tanggal Daftar',
            'NIK',
            'Status',
        ];
    }
}
