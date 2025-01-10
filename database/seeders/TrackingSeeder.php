<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trackings')->insert([
            [
                'id' => 1,
                'share_id' => 1,
                'status' => 'Donation accepted',
                'description' => null,
                'photo_url' => null,
                'created_at' => '2024-12-18 17:30:59',
                'updated_at' => '2024-12-18 17:30:59',
            ],
            [
                'id' => 2,
                'share_id' => 1,
                'status' => 'Order in process',
                'description' => 'Team sedang berkomunikasi dengan RT lokasi',
                'photo_url' => null,
                'created_at' => '2024-12-19 00:31:58',
                'updated_at' => null,
            ],
            [
                'id' => 3,
                'share_id' => 1,
                'status' => 'Food is ready',
                'description' => null,
                'photo_url' => 'https://img.freepik.com/free-photo/side-view-friends-preparing-food-together_23-2149481191.jpg?t=st=1734525032~exp=1734528632~hmac=a22ac690fdcdfdaf6d3f5e93351e8c347b8c3991c7d7ad9a7519b8c6079fa7f3&w=360',
                'created_at' => '2024-12-21 00:31:58',
                'updated_at' => null,
            ],
        ]);
    }
}
