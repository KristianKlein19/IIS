<?php

namespace Database\Factories;

use App\Models\Hodnotil;
use Illuminate\Database\Eloquent\Factories\Factory;

class HodnotilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hodnotil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_users' => rand(1,50),
            'id_prispevek' => rand(1,250),
            'hodnotil' => rand(0, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
