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
        //\App\Models\User::factory(50)->create();
        //\App\Models\Skupina::factory(10)->create();
        //\App\Models\Vlakno::factory(50)->create();
        //\App\Models\Prispevek::factory(250)->create();
        //\App\Models\Zadost::factory(10)->create();
        //\App\Models\Clen::factory(100)->create();
        //\App\Models\Hodnotil::factory(1000)->create();
        //\App\Models\Moderator::factory(20)->create();
        $this->call(TestUserSeeder::class);
    }
}
