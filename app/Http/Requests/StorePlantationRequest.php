<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePlantationRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'tipo_poda' => ['required', 'string'],
            'numero_plantas_podadas' => ['required', 'integer'],
            'fecha_podada' => ['required', 'date'],
            'mz_area_podada' => ['required', 'numeric'],
            'tipo_plantacion' => ['required', 'string'],
        ];
    }
}
