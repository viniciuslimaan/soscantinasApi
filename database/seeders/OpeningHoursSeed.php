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
                    'week_days' => 'sunday',
                    'time_start' => null,
                    'time_end' => null,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
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
                [
                    'week_days' => 'wednesday',
                    'time_start' => '06:30:00',
                    'time_end' => '10:30:00',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'thursday',
                    'time_start' => '06:30:00',
                    'time_end' => '10:30:00',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'friday',
                    'time_start' => '06:30:00',
                    'time_end' => '10:30:00',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'saturday',
                    'time_start' => null,
                    'time_end' => null,
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                // User 2
                [
                    'week_days' => 'sunday',
                    'time_start' => null,
                    'time_end' => null,
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'monday',
                    'time_start' => '08:00:00',
                    'time_end' => '12:30:00',
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'tuesday',
                    'time_start' => '08:00:00',
                    'time_end' => '12:30:00',
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'wednesday',
                    'time_start' => '08:00:00',
                    'time_end' => '12:30:00',
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'thursday',
                    'time_start' => '08:00:00',
                    'time_end' => '12:30:00',
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'friday',
                    'time_start' => '08:00:00',
                    'time_end' => '12:30:00',
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'week_days' => 'saturday',
                    'time_start' => null,
                    'time_end' => null,
                    'user_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]
        );
    }
}
