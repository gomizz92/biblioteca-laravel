<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    
    public function index()
    {
        
        // Asegúrate de pasar las categorías a la vista
        $categories = Category::all(); // Asegúrate de tener el modelo Category importado
    
        return view('categories.index', compact('categories', 'categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
            // Validar el nombre de la categoría
    $request->validate([
        'name' => 'required|string|min:3|max:255',
    ]);

    // Verificar si la categoría ya existe
    $existingCategory = Category::where('name', $request->name)->first();

    if ($existingCategory) {
        return redirect()->back()->withErrors(['name' => 'La categoría ya existe.']);
    }

    // Crear la nueva categoría
    Category::create([
        'name' => $request->name,
    ]);

    return redirect()->route('categories.index')->with('success', 'Categoría creada exitosamente.');
    }

    public function destroy(Category $category)
    {
        // Verificar si la categoría tiene libros asociados
        if ($category->books()->count() > 0) {
            return redirect()->route('categories.index')->withErrors(['error' => 'No se puede eliminar la categoría porque tiene libros asociados.']);
        }

        // Si no hay libros asociados, proceder a eliminar
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}
