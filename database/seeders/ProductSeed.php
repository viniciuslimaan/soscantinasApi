<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert(
            [
                [
                    'name' => 'Salgado de Carne',
                    'type' => 'snack',
                    'price' => 7.0,
                    'old_price' => null,
                    'description' => 'Um delicioso salgado de carne.',
                    'photo' => 'https://www.placemonkeys.com/500/350',
                    'quantity_day' => 10,
                    'hidden' => 0,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Keleck',
                    'type' => 'other',
                    'price' => 4.99,
                    'old_price' => 10.0,
                    'description' => 'Salgadinho de sabor bacon.',
                    'photo' => 'https://www.placemonkeys.com/500/350',
                    'quantity_day' => null,
                    'hidden' => 0,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
