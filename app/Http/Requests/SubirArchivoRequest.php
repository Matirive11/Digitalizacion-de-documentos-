<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;
class SubirArchivoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'archivo' => 'required|file|mimes:jpeg,png,jpg,gif,pdf|max:10240', // Acepta imágenes y PDFs

        ];
    }
    public function messages(): array
    {
        return [
            'archivo.required' => 'Debe seleccionar un archivo.',
            'archivo.file' => 'El archivo debe ser válido.',
            'archivo.mimes' => 'Solo se permiten archivos en formato: PNG, JPG, JPEG, PDF.',
            'archivo.max' => 'El archivo no puede superar los 2MB.',
            'archivo.min' => 'El archivo debe ser de al menos 50KB.',
        ];
    }
}
