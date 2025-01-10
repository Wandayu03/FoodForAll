<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shares')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'history_id' => 1,
                'status' => 'pending',
                'event_name' => 'Awal Tahun Berkah',
                'food_type' => 'Makanan Nusantara',
                'estimated_people' => 30,
                'budget' => 2500000.00,
                'distribution_date' => '2024-12-31',
                'distribution_address' => 'Panti Asuhan Jl Berlian',
                'created_at' => '2024-12-18 17:30:10',
                'updated_at' => '2024-12-18 17:30:10',
            ],
        ]);
    }
}
