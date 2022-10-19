<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\waktupilih;
use Carbon\Carbon;

class waktuseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        $date =  Carbon::now()->format('Y-m-d');
        $waktu = waktupilih::create([
         'tanggal_pemilu' => $date,      
         'tanggal_selesai_pemilu' => $date
         ]);
    }
}
