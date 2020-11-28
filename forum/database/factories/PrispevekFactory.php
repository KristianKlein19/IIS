<?php

namespace Database\Factories;

use App\Models\Prispevek;
use Illuminate\Database\Eloquent\Factories\Factory;

class PrispevekFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Prispevek::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'karma' => rand(-200, 200),
            'text' => $this->faker->sentence( rand(15,100) ),
            'soucast' => rand(1,50),
            'odpoved' => null,
            'prispevatel' => rand(1,50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
