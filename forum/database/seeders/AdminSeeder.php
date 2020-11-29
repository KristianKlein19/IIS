<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
                'email' => 'test@example.com',
                'password' => Hash::make('Heslo123'),
                'admin' => true
            ]);
        }
    }
}