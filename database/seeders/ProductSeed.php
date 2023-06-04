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
                [
                    'name' => 'Coxinha de Frango',
                    'type' => 'snack',
                    'price' => 8.99,
                    'old_price' => null,
                    'description' => 'Coxinha com recheio de frango e catupiry.',
                    'photo' => 'https://www.placemonkeys.com/500/350',
                    'quantity_day' => null,
                    'hidden' => 0,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Coca-cola lata',
                    'type' => 'drink',
                    'price' => 5.99,
                    'old_price' => 7.50,
                    'description' => 'Coca-cola lata 300ml.',
                    'photo' => 'https://www.placemonkeys.com/500/350',
                    'quantity_day' => null,
                    'hidden' => 0,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Donuts de Chocolate',
                    'type' => 'sweet',
                    'price' => 12.50,
                    'old_price' => 19.99,
                    'description' => 'Donuts grande com recheio e cobertura de chocolate.',
                    'photo' => 'https://www.placemonkeys.com/500/350',
                    'quantity_day' => 8,
                    'hidden' => 0,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'Donuts - Doce de Leite',
                    'type' => 'sweet',
                    'price' => 19.99,
                    'old_price' => null,
                    'description' => 'Donuts grande com recheio e cobertura de doce de leite.',
                    'photo' => 'https://www.placemonkeys.com/500/350',
                    'quantity_day' => 5,
                    'hidden' => 1,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
