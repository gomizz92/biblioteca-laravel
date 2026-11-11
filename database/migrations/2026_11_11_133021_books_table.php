<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('title'); // Título del libro
            $table->string('author'); // Autor del libro
            $table->text('description')->nullable(); // Descripción del libro, opcional
            $table->year('published_year'); // Año de publicación
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // FK a categories
            $table->timestamps(); // timestamps para created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
