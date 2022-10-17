<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\vote;


class voteseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        
        for($i = 1; $i <= 15; $i++){
           
         $vote = vote::create([
            'vote_count' => '1',
            'id_paslon' => $faker->numberBetween(1, 3),
        ]);
          }
    }
}
