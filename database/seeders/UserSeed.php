<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'cnpj' => '21.617.217/0001-15',
                    'name' => 'Sabor Doce',
                    'email' => 'sabordoce@cantina.com',
                    'password' => bcrypt('123456'),
                    'phone' => '(14) 12345-6789',
                    'school_name' => 'Fatec Lins',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'cnpj' => '59.815.742/0001-18',
                    'name' => 'Cantina do Amor',
                    'email' => 'cantinadoamor@cantina.com',
                    'password' => bcrypt('123456'),
                    'phone' => '(14) 98765-4321',
                    'school_name' => '21 de Abril',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
