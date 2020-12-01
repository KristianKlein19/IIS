<?php

namespace Database\Factories;

use App\Models\Skupina;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkupinaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Skupina::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nazev' => $this->faker->sentence( rand(1,3) ),
            'popis' => $this->faker->sentence( rand(10,25) ),
            'zabezpeceni_profilu' => true,
            'zabezpeceni_obsahu' => true,
            'spravce' => rand(1,50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
