<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HallRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'personnel_minimum' => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required' => 'Le champ Nom est requis.',
            'nom.string' => 'Le champ Nom doit être une chaîne de caractères.',
            'nom.max' => 'Le champ Nom ne peut pas dépasser 255 caractères.',
            'personnel_minimum.required' => 'Le champ Personnel Minimum est requis.',
            'personnel_minimum.integer' => 'Le champ Personnel Minimum doit être un nombre entier.',
            'personnel_minimum.min' => 'Le champ Personnel Minimum doit être d\'au moins 1.',
        ];
    }
}
