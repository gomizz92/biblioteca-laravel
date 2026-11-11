<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $query = Book::query();
    
        // Si hay un filtro de categoría
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
    
        $books = $query->latest()->get();
        
        // Asegúrate de pasar las categorías a la vista
        $categories = Category::all(); // Asegúrate de tener el modelo Category importado
    
        return view('books.index', compact('books', 'categories'));
    }


    public function create()
    {
        // Asegúrate de pasar las categorías a la vista
        $categories = Category::all(); // Asegúrate de tener el modelo Category importado
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
         // Validar los datos de entrada
        $request->validate([
            'title' => 'required|string|min:3|max:255', // Título obligatorio, mínimo 3 caracteres
            'author' => 'required|string|max:255', // Autor obligatorio
            'published_year' => 'required|integer|digits:4|between:1900,' . date('Y'), // Año obligatorio, debe ser un año válido
            'category_id' => 'nullable|exists:categories,id', // Opcional, debe existir en categories si se proporciona
        ]);

        Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Libro agregado exitosamente.');
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'published_year' => 'required|integer',
            'category_id' => 'nullable|integer',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index')->with('success', 'Libro actualizado exitosamente.');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Libro eliminado exitosamente.');
    }


}