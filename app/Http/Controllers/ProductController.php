<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProductsByCategory($relationName, $categoryId)
    {
        // Obtener los productos que pertenecen a la categoría especificada
        $products = Product::whereHas($relationName, function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })->get();
    
        // Retornar la vista con los productos y la categoría
        return view('products.view-products', ['products' => $products, 'id' => $categoryId]);
    }
}
