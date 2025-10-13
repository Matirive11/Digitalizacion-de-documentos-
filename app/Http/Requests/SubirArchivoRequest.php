<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class SubirArchivoRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado para realizar esta solicitud.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para la subida del archivo.
     */
    public function rules(): array
    {
        return [
            'archivo' => [
                'required',
                'file',
                File::types(['png', 'jpg', 'jpeg', 'gif', 'pdf'])
                    ->max(10 * 1024) // máximo 10 MB
                    ->min(50),       // mínimo 50 KB
            ],
        ];
    }

    /**
     * Mensajes personalizados para los errores de validación.
     */
    public function messages(): array
    {
        return [
            'archivo.required' => 'Debe seleccionar un archivo.',
            'archivo.file' => 'El archivo debe ser válido.',
            'archivo.mimes' => 'Solo se permiten archivos en formato: PNG, JPG, JPEG, GIF o PDF.',
            'archivo.max' => 'El archivo no puede superar los 10 MB.',
            'archivo.min' => 'El archivo debe pesar al menos 50 KB.',
        ];
    }
}
