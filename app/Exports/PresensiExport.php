<?php

namespace App\Exports;

use App\Models\Presensi;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class PresensiExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        // Fetch all data without any specific filters
        return Presensi::query();
    }

    public function headings(): array
    {
        // Define the column headings
        return [
            'No',
            'NISN',
            'Nama',
            'Kelas',
            'Guru',
            'Mapel',
            'Keterangan',
            'Bln/Tgl/Thn',
        ];
    }

    public function map($presensi): array
    {
        // Map each row data to the corresponding columns
        return [
            $presensi->id,
            $presensi->siswas->nisn,
            $presensi->siswas->nama,
            $presensi->kelas->hasil_kelas,
            $presensi->users->username,
            $presensi->mapels->nama_mapel,
            $presensi->presensi,
            $presensi->created_at ? $presensi->created_at->format('d F Y') : 'N/A',
        ];
    }
}
