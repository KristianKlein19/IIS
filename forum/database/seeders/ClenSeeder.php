<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Clen;

class ClenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clen::factory(Clen::class)->create();
    }
}
