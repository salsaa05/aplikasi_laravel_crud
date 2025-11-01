<?php

namespace App\Exports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MahasiswaExport implements FromCollection, WithHeadings
{
    // Ambil data dari tabel mahasiswa
    public function collection()
    {
        return Mahasiswa::select('nama', 'nim', 'email')->get();
    }

    // Header kolom
    public function headings(): array
    {
        return ['Nama', 'NIM', 'Email'];
    }
}