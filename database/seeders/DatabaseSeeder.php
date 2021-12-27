<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
Use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
            'name' => 'Felix Gabriel',
            'email' => 'felix.gjonathan@gmail.com',
            'password' => Hash::make('123123'),
            'address' => 'jalan-jalan',
            'gender' => 'M',
            'role' => 'Admin',
        ]);
    }
}
