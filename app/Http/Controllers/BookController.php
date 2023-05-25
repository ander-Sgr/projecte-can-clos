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

    public function edit(Request $request, $id)
    {
        $data = array(
            'name' => $request->input('name-edit-book'),
            'typeBook' => $request->input('typeBook-edit-book'),
            'cantidad' => $request->input('cantidad-edit-book')
        );

        $product =  Product::find($id);
        $product->name = $data['name'];
        $product->cantidad =  $data['cantidad'];
        $product->save();

        if ($product->book) {
            $book = $product->book;
            $book->typeBook = $data['typeBook'];
            $book->save();
        }

        return redirect()->back()->with('success', 'Producto actualizado correctamente.');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            if ($product->book) {
                $product->book->delete();
            }
            $product->delete();
            
            return redirect()->back()->with('success', 'Producto eliminado correctamente.');
        }
        return redirect()->back()->with('error', 'El producto no existe.');
    }

    public function getBookData($id)
    {
        $booksProduct = BookProduct::find($id);

        if ($booksProduct) {
            $productData = array(
                'idProduct' => $booksProduct->product->id,
                'name' => $booksProduct->product->name,
                'typeBook' => $booksProduct->typeBook,
                'cantidad' => $booksProduct->product->cantidad
            );

            return response()->json($productData);
        }

        return response()->json(['error' => 'Producto Libro no encontrado']);
    }
}
