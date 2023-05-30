<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentMethodSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert(
            [
                // User 1
                [
                    'name' => 'pix',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'money',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'credit_card',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // User 2
                [
                    'name' => 'pix',
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'money',
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
