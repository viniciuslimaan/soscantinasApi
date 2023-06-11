<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(
            [
                [
                    'phone' => '(14) 12345-6789',
                    'name' => 'Usuário Teste',
                    'password' => bcrypt('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'phone' => '(14) 98765-4321',
                    'name' => 'Cuca Beludo',
                    'password' => bcrypt('123456'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
