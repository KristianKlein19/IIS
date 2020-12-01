<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Moderator;

class ModeratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Moderator::factory(Moderator::class)->create();
    }
}
