<?php

namespace Database\Seeders;

use App\Models\BookType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookType::create(['name' => 'Libros para adultos']);
        BookType::create(['name' => 'Libros infantiles']);
    }
}
