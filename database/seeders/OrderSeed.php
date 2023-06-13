<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert(
            [
                [
                    'withdrawn_time' => null,
                    'status' => 'waiting',
                    'canceled_by' => null,
                    'client_id' => 1,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'withdrawn_time' => Carbon::create(2023, 5, 28, 10, 15, 0)->toDateTimeString(),
                    'status' => 'withdrawn',
                    'canceled_by' => null,
                    'client_id' => 1,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'withdrawn_time' => null,
                    'status' => 'canceled',
                    'canceled_by' => 'client',
                    'client_id' => 1,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
