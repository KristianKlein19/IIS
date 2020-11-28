<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        \App\Models\User::factory(50)->create();
        \App\Models\Skupina::factory(50)->create();
        \App\Models\Vlakno::factory(50)->create();
        \App\Models\Prispevek::factory(50)->create();
        \App\Models\Zadost::factory(50)->create();
        \App\Models\Clen::factory(50)->create();
        \App\Models\Hodnotil::factory(50)->create();
        \App\Models\Moderator::factory(50)->create();
    }
}
