<?php

namespace App\Http\Controllers;

use App\Models\FoodProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function store(Request $request)
    {
        $data = array(
            'name' => $request->input('name-product-food'),
            'typeFood' => $request->input('typeFood-product-food'),
            'cantidad' => $request->input('cantidad-product-food')
        );

        $product = new Product;
        $product->name = $data['name'];
        $product->category_id = $request->input('category_id');
        $product->cantidad = $data['cantidad'];
        $product->save();

        $foodProduct = new FoodProduct;
        $foodProduct->product_id = $product->id;
        $foodProduct->typeFood = $data['typeFood'];
        $foodProduct->save();

        return redirect()->back()->with('success', 'Producto creado exitosamente');
    }

    public function edit(Request $request, $id)
    {  
        $data = array(
            'name' => $request->input('name-edit-food'),
            'typeFood' => $request->input('typeFood-edit-food'),
            'cantidad' => $request->input('cantidad-edit-food')
        );
        $product = Product::find($id);
        $product->name = $data['name'];
        $product->cantidad = $data['cantidad'];
        $product->save();

        if ($product->food) {
            $food = $product->food;
            $food->typeFood = $data['typeFood'];
            $food->save();
        }

        return redirect()->back()->with('success', 'Producto actualizado correctamente.');

    }

    public function getDataFood($id)
    {

        $foodProduct = FoodProduct::find($id);

        if ($foodProduct) {
            $productData = array(
                'idProduct' => $foodProduct->product->id,
                'name' => $foodProduct->product->name,
                'typeFood' => $foodProduct->typeFood,
                'cantidad' => $foodProduct->product->cantidad
            );  

            return response()->json($productData);
        }

        return response()->json(['error' => 'Producto alimentario no encontrado'], 404);
    }
}
