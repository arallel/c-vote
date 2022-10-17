<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\waktupilih;

class waktuseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $waktu = waktupilih::create([
         'tanggal_pemilu' => '2022-10-17',
         'tanggal_selesai_pemilu' => '2022-10-17',
         ]);
    }
}
