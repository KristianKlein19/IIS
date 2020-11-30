<?php

namespace Database\Factories;

use App\Models\Zadost;
use Illuminate\Database\Eloquent\Factories\Factory;

class ZadostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Zadost::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'typ' => rand(0, 1),
            'text' => $this->faker->sentence( rand(5, 10) ),
            'stav' => rand(0, 1),
            'od' => rand(1,50),
            'do' => rand(1,50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
