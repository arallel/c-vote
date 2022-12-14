<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\paslon;

class PaslonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Paslon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foto_calon' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'calon_ketua' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'calon_wakil' => $this->faker->regexify('[A-Za-z0-9]{255}'),
            'published_at' => $this->faker->dateTime(),
        ];
    }
}
