<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('histories')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'activity_type' => 'share',
                'created_at' => '2024-12-18 17:30:10',
                'updated_at' => '2024-12-18 17:30:10',
            ],
        ]);
    }
}
