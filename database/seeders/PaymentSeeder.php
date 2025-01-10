<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            [
                'id' => 1,
                'user_id' => 1,
                'donation_id' => null,
                'share_id' => 1,
                'transaction_id' => 'share_677ff80eb0230',
                'activity_type' => 'share',
                'amount' => 12121212.00,
                'status' => 'pending',
                'snap_token' => '571d12bd-ca6f-4e52-a4f8-ef721b85b39d',
                'created_at' => '2025-01-09 09:23:43',
                'updated_at' => '2025-01-09 09:23:43',
            ],
        ]);
    }
}
