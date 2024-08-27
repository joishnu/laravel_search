<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 customers, each with 3 orders, each order having 2 items
        Customer::factory()
        ->count(50)
        ->has(
            Order::factory()->count(3)->hasItems(2) // Each order will have 2 items
        )
        ->create();
    }
}
