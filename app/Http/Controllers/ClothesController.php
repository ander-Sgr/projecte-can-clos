<?php

namespace App\Http\Controllers;

use App\Models\ClothesProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ClothesController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => ($request->has('gender')) ? 'required' : '',
            'typeClothe' => ($request->has('typeClothe')) ? 'required' : '',
            'cantidad' => 'required|integer',
            'rangeAge' => ($request->typeClothe == 'infantil') ? 'required' : '',
        ]);


        $product = new Product;
        $product->name = $validatedData['name'];
        $product->category_id = $request->category_id;
        $product->cantidad = $validatedData['cantidad'];
        $product->save();

        $clothesProduct = new ClothesProduct;
        $clothesProduct->product_id = $product->id;
        $clothesProduct->typeClothe = $validatedData['typeClothe'];
        $clothesProduct->gender = $validatedData['gender'];
        $clothesProduct->rangeAge = ($request->typeClothe == 'infantil') ? $validatedData['rangeAge'] : null;
        $clothesProduct->save();

        return redirect()->back()->with('success', 'Producto creado exitosamente');
    }

    public function edit(Request $request, $id)
    {
        $data = array(
            'name' => $request->input('name-product'),
            'gender' => $request->input('gender-product'),
            'typeClothe' => $request->input('typeClothe-product'),
            'rangeAge' => $request->input('rangeAge-product'),
            'cantidad' => $request->input('cantidad-product')
        );

        $product = Product::find($id);
        $product->name = $data['name'];
        $product->cantidad = $data['cantidad'];
        $product->save();

        if ($product->clothes) {
            $clothe = $product->clothes;
            $clothe->gender = $data['gender'];
            $clothe->typeClothe = $data['typeClothe'];
            $clothe->rangeAge = $data['rangeAge'];
            $clothe->save();
        }
        return redirect()->back()->with('success', 'Producto actualizado correctamente.');
    }

    public function getClotheData($id)
    {
        $clothesProduct = ClothesProduct::find($id);

        if ($clothesProduct) {
            // Obtener los datos del producto de ropa
            $productData = [
                'idProduct' => $clothesProduct->product->id,
                'name' => $clothesProduct->product->name,
                'typeClothe' => $clothesProduct->typeClothe,
                'gender' => $clothesProduct->gender,
                'rangeAge' => $clothesProduct->rangeAge,
                'cantidad' => $clothesProduct->product->cantidad
            ];

            // Devolver los datos del producto en formato JSON
            return response()->json($productData);
        }

        // Si el producto de ropa no existe, devolver una respuesta con error
        return response()->json(['error' => 'Producto de ropa no encontrado'], 404);
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            if ($product->clothes) {
                $product->clothes->delete();
            }

            $product->delete();

            return redirect()->back()->with('success', 'Producto eliminado correctamente.');
        }

        return redirect()->back()->with('error', 'El producto no existe.');
    }
}
