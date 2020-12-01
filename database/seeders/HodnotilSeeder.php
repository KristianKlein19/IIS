<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hodnotil;

class HodnotilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hodnotil::factory(Hodnotil::class)->create();
    }
}
