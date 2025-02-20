<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'namaUser' => 'admin',
            'UserId' => 'U00001',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'nomorTelfon' => '08123456789'
        ]);

        User::create([
            'namaUser' => 'user1',
            'UserId' => 'U00002',
            'email' => 'user1@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'nomorTelfon' => '08987654321'
        ]);
    }
}
