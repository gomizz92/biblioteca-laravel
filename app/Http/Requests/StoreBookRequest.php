<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3|max:255', // Obligatorio, mínimo 3 caracteres
            'author' => 'required|string|max:255', // Obligatorio
            'published_year' => 'required|integer|digits:4|between:1900,' . date('Y'), // Obligatorio, año válido
            'category_id' => 'required|exists:categories,id', // Obligatorio, debe existir en categories
        ];
    }


    public function messages()
{
    return [
        'title.required' => 'El título es obligatorio.',
        'title.min' => 'El título debe tener al menos 3 caracteres.',
        'title.max' => 'El título no puede exceder los 255 caracteres.',
        'author.required' => 'El autor es obligatorio.',
        'published_year.required' => 'El año de publicación es obligatorio.',
        'published_year.integer' => 'El año de publicación debe ser un número entero.',
        'published_year.digits' => 'El año de publicación debe tener 4 dígitos.',
        'published_year.between' => 'El año de publicación debe estar entre 1900 y ' . date('Y') . '.',
        'category_id.required' => 'La categoría es obligatoria.',
    ];
}

}
