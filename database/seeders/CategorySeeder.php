<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Ropa']);
        Category::create(['name' => 'Alimentacion']);
        Category::create(['name' => 'Pañales']);
        Category::create(['name' => 'Libros']);
        Category::create(['name' => 'Material Escolar']);
    }
}
