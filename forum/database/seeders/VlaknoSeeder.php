<?php

namespace Database\Seeders;

use App\Models\Vlakno;
use Illuminate\Database\Seeder;

class VlaknoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vlakno::factory(Vlakno::class)->create();
    }
}
