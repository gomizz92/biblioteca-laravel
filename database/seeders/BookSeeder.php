<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;           // Importación de tu modelo Book
use App\Models\Category;       // Importación de tu modelo Category
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'El camino de Laravel',
            'author' => 'Juan Pérez',
            'published_year' => 2023,
            'category_id' => 3 // Asegúrate de que este ID exista
        ]);

        Book::create([
            'title' => 'Historia Universal',
            'author' => 'Ana García',
            'published_year' => 2020,
            'category_id' => 2
        ]);

        Book::create([
            'title' => 'El Coronel no Tiene Quien le Escriba',
            'author' => 'Gabriel García Márquez',
            'published_year' => 1961,
            'category_id' => 4
        ]);
    }
}
