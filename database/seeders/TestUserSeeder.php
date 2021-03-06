<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('name', 'admin')->first();
        if (!$user) {
            User::create([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('heslo789'),
                'admin' => true
            ]);

            User::create([
                'name' => 'owner',
                'email' => 'owner@example.com',
                'password' => Hash::make('heslo456')
            ]);

            User::create([
                'name' => 'moderator',
                'email' => 'mod@example.com',
                'password' => Hash::make('heslo123')
            ]);

            User::create([
                'name' => 'member',
                'email' => 'member@example.com',
                'password' => Hash::make('heslo000')
            ]);

            User::create([
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => Hash::make('password')
            ]);
        }
    }
}
