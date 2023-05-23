<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ropaCategory = Category::where('name', 'Ropa')->first();

        Product::create(['name' => 'Camiseta infantil', 'category_id' => $ropaCategory->id]);
        Product::create(['name' => 'Camisa para hombres', 'category_id' => $ropaCategory->id]);
    }
}
