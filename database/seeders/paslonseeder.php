<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class paslonseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paslon1 = DB::table('paslons')->insert([
            'paslon_id' => '1',
           'foto_calon' => 'fotocalon/sxwPsHSTTK6Ual19eAZkKkPIkydm8kI113sOIaaJ.jpg',
           'calon_ketua' => 'Devi Dwi Harfian',
           'calon_wakil' => 'Irnanda Bagus Prasetyo',
           ]);
            $paslon2 = DB::table('paslons')->insert([
            'paslon_id' => '2',
           'foto_calon' => 'fotocalon/8ZYE74lOy9Ukv6R4nYjQkZtiKwCa3P3zXEbrpxh7.jpg',
           'calon_ketua' => 'Riska Nur Fatimah',
           'calon_wakil' => 'M.Ulric Nakhlah Adikara',
           ]);
             $paslon3 = DB::table('paslons')->insert([
            'paslon_id' => '3',
           'foto_calon' => 'fotocalon/b2ERxOPv4DWoD0V5uAFvPYXVANwiUVFlrXTEPuWb.jpg',
           'calon_ketua' => 'Nyndy Erni Sri Yuliastin',
           'calon_wakil' => 'Nafisah Layla Farah Caren',
           ]);
    }
}
