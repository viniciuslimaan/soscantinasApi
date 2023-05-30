<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert(
            [
                // Order 1
                [
                    'quantity' => 1,
                    'order_id' => 1,
                    'product_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'quantity' => 2,
                    'order_id' => 1,
                    'product_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // Order 2
                [
                    'quantity' => 5,
                    'order_id' => 2,
                    'product_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // Order 3
                [
                    'quantity' => 15,
                    'order_id' => 3,
                    'product_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
