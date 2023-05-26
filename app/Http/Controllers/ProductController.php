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

    public function store(Request $request)
    {
        $data = array(
            'name' => $request->input('name-product'),
            'cantidad' => $request->input('cantidad-product')
        );

        $product = new Product;
        $product->name = $data['name'];
        $product->category_id = $request->input('category_id');
        $product->cantidad = $data['cantidad'];
        $product->save();

        return redirect()->back()->with('success', 'Producto creado exitosamente');
    }

    public function getProductData($id)
    {
        $product = Product::find($id);

        if ($product) {
            $productData = array(
                'name' =>  $product->name,
                'cantidad' => $product->cantidad
            );
            return response()->json($productData);
        }

        return response()->json(['error' => 'Producto  no encontrado'], 404);
    }

    public function edit(Request $request, $id)
    {
        $data = array(
            'name' => $request->input('name-edit-product'),
            'cantidad' => $request->input('cantidad-edit-product')
        );

        $product = Product::find($id);
        $product->name = $data['name'];
        $product->cantidad =  $data['cantidad'];
        $product->save();

        return redirect()->back()->with('success', 'Producto actualizado correctamente.');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            
            return redirect()->back()->with('success', 'Producto eliminado correctamente.');
        }
        return redirect()->back()->with('error', 'El producto no existe.');

    }
}
