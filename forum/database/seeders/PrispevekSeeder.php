<?php

namespace Database\Seeders;

use App\Models\Prispevek;
use Illuminate\Database\Seeder;

class PrispevekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prispevek::factory(Prispevek::class)->create();
    }
}
