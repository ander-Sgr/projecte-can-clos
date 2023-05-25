<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        $categoria = Category::find($id);
        $productos = Product::where('category_id', $id)->get();
    
        return view('products.view-products', compact('categoria', 'productos', 'id'));
    }
}
