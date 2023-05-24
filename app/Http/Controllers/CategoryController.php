<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validatedData = $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        try {
            $category = new Category();
            $category->name = $validatedData['category_name'];

            $category->save();

            return redirect('/')->with('success', 'Categoría creada exitosamente');
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al crear la categoría',
            ], 500);
        }
    }

    public function updateView($id){
        return view('create-category', ['category', Category::find($id)]);
    }

    public function edit(Request $request, $id)
    {   
        $data = array(
            'name' => $request->input('category_name')
        );
    
        $category = Category::find($id);
        $category->update($data);
        return redirect('/')->with('success', 'Categoría creada exitosamente');

    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();

        return redirect('/')->with('success', 'Categoría eliminada exitosamente');
    }
}
