<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminAcount extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'masadmin',
            'email' => 'masadmin@gmail.com',
            'password' => bcrypt('masadmin123'),
        ]);
    }
}