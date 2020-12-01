<?php

namespace Database\Factories;

use App\Models\Clen;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_users' => rand(1,50),
            'id_skupina' => rand(1,10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
