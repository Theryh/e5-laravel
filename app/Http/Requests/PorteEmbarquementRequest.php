<?php


namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PorteEmbarquementRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'est_ouverte' => 'nullable|boolean',
            'capacite_maximale' => 'required|integer|min:0',
        ];
    }
}

