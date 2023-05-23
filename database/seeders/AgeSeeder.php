<?php

namespace Database\Seeders;

use App\Models\Age;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Age::create(['range' => '0-6 meses']);
        Age::create(['range' => '6-12 meses']);
        Age::create(['range' => '1-5 años']);
        Age::create(['range' => '5-9 años']);
        Age::create(['range' => '9-12 años']);
    }
}
