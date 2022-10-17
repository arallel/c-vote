<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         return new User([
            'name'  => $row['name'],
            'nis'  => $row['nis'],
            'level'  => $row['level'],
            'token'  => Str::random(6),
            'password'  => $row['password'],
        ]);
    }
}
