<?php

namespace Database\Factories;

use App\Models\Vlakno;
use Illuminate\Database\Eloquent\Factories\Factory;

class VlaknoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vlakno::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nazev' => $this->faker->sentence( rand(1,3) ),
            'popis' => $this->faker->sentence( rand(0,25) ),
            'stav' => false,
            'pripnute_vlakno' => false,
            'soucast' => rand(1,10),
            'zakladatel' => rand(1,50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
