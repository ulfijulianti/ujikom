<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
   
    {
        User::create([
            'name' => 'Siti Salwa Salsabil',
            'email' => 'sitisalwasalsabil@gmail.com',
            'password' => Hash::make('password123'),
            'gender' => 'Perempuan',
            'phone' => '08675673',
            'role' => 'Operator',
            'status' => 'TIDAK DIKETAHUI',
        ]);
    }
}