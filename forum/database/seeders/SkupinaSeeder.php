<?php

namespace Database\Seeders;

use App\Models\Skupina;
use Illuminate\Database\Seeder;

class SkupinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skupina::factory(Skupina::class)->create();
    }
}
