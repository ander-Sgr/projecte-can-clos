<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(AgeSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(BookTypeSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(StockMovementSeeder::class);
    }
}
