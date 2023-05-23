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


}
