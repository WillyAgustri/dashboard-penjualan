<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('admin'),
                'level' => '2',
            ],
            [
                'name' => 'user',
                'email' => 'user@example.com',
                'password' => bcrypt('user'),
                'level' => '1',
            ],
            ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}