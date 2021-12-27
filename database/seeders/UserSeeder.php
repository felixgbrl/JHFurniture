<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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