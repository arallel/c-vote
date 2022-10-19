<?php

namespace App\Imports;

use App\Models\tokenuser;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;


class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new tokenuser([
            'nama'  => $row['nama'],
            'kelas'  => $row['kelas'],
            'nis'  => $row['nis'],
            'token'  => Str::random(6),
        ]);
    }
}
