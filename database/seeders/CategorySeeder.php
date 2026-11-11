<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;           // Importación de tu modelo Book
use App\Models\Category;       // Importación de tu modelo Category
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Ciencia Ficción']);
        Category::create(['name' => 'Historia']);
        Category::create(['name' => 'Programación']);
        Category::create(['name' => 'Novela']);
    }
}
