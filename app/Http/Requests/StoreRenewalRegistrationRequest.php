<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRenewalRegistrationRequest extends FormRequest
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
            'fecha_injertacion' => ['required', 'date'],
            'numero_plantas_injertada_por_mz' => ['required', 'integer'],
            'nombre_clones_injertados' => ['required', 'array'],
            'nombre_proveedor' => ['required', 'string'],
        ];
    }
}
