<?php

namespace App\Exports;

use App\Models\tokenuser;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class UsersExport implements FromCollection, WithMapping, WithHeadings, WithStyles, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return tokenuser::all();
    }
    public function headings(): array
    {
        return [
            'Nama',
            'Kelas',
            'nis',

        ];
    }
    public function startCell(): string
    {
        return 'A1';
    }
    public function map($user): array
    {
        return [
            $user->nama,
            $user->kelas,
            $user->nis,

        ];
    }
    public function styles(Worksheet $sheet)
    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }
    public function columnWidths(): array
    {
        return [
            'E' => 63,
        ];
    }
}
