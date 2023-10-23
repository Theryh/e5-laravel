<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerminalRequest extends FormRequest
{

  public function authorize(): bool{
      return true;}



public function rules(): array{
    return [
    'nom' => 'required',
    'emplacement' => 'required',
    'date_mise_en_service' => 'required',
    ];
}
}
