<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;


class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker::create('id_ID');
        $user = User::create([
            'name' => 'admin',
            'nis' => '12',
            'level' => 'admin',
            'password' => Hash::make('1234'),
        ]);
        $user = User::create([
            'name' => 'vito',
            'nis' => '122',
            'level' => 'siswa',
            'token' => Str::random(6),
            'password' => Hash::make('1234'),
        ]);
       

        // for($i = 1; $i <= 15; $i++){
        //     User::create([
        //     'name' => $faker->name,
        //     'nis' => $faker->unique()->numberBetween(20,1000),
        //     'token' => Str::random(6),
        //     'level' => 'siswa',
        //     'password' => Hash::make('1234'),
        // ]);
        // }

    }
}
