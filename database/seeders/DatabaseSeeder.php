<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User Seeds
        $this->call(UserSeed::class);
        $this->call(PaymentMethodSeed::class);
        $this->call(OpeningHoursSeed::class);
        $this->call(ProductSeed::class);

        // Client Seeds
        $this->call(ClientSeed::class);
        $this->call(OrderSeed::class);
        $this->call(OrderItemSeed::class);

        // Admin Seeds
        $this->call(AdminSeed::class);
    }
}
