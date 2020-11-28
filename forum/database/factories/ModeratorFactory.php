<?php

namespace Database\Factories;

use App\Models\Moderator;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModeratorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Moderator::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_users' => rand(1,50),
            'id_skupina' => rand(1,50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
