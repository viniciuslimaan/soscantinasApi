<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpeningHoursSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('opening_hours')->insert(
            [
                [
                    'week_days' => 'monday',
                    'time_start' => '06:30:00',
                    'time_end' => '10:30:00',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'tuesday',
                    'time_start' => '06:30:00',
                    'time_end' => '10:30:00',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
