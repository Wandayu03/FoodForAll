<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'dea@gmail.com',
                'email' => 'dea@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$aHgpaRqLHdp9rXP1Y5uEveO4LG7.0woUoTCqaAbxi2wKh4yZXhlEm',
                'is_admin' => 0,
                'remember_token' => null,
                'created_at' => '2025-01-09 09:22:50',
                'updated_at' => '2025-01-09 09:22:50',
            ],
            [
                'id' => 2,
                'name' => 'admin@gmail.com',
                'email' => 'admin@gmail.com',
                'email_verified_at' => null,
                'password' => '$2y$12$iJ/e4WylRZFhP.NVrIDv4O9HDvosLQbrlg33wARvyAtKlvYxhx3AS',
                'is_admin' => 1,
                'remember_token' => null,
                'created_at' => '2025-01-09 09:24:54',
                'updated_at' => '2025-01-09 09:24:54',
            ],
        ]);
    }
}
