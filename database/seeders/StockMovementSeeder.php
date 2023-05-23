<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product = Product::where('name', 'Camiseta infantil')->first();

        StockMovement::create([
            'product_id' => $product->id,
            'quantity' => 10,
            'movement_type' => 'entrada'
        ]);
    }
}
