<?php

namespace Database\Seeders;

use App\Models\Zadost;
use Illuminate\Database\Seeder;

class ZadostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Zadost::factory(Zadost::class)->create();
    }
}
