<?php

namespace App\Http\Controllers;

use App\Models\BookProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->input('name-product-book'),
            'typeBook' => $request->input('typeBook-product-book'),
            'cantidad' => $request->input('cantidad-product-book'),
        );

        $product = new Product;
        $product->name = $data['name'];
        $product->category_id = $request->input('category_id');
        $product->cantidad = $data['cantidad'];
        $product->save();
        
        $bookProduct = new BookProduct;
        $bookProduct->product_id = $product->id;
        $bookProduct->typeBook = $data['typeBook'];
        $bookProduct->save();

        return redirect()->back()->with('success', 'Producto creado exitosamente');
    }
}
