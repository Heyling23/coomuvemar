<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentCleaningRegistrationRequest extends FormRequest
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
            'actividad' => ['required', 'string'],
            'equipo' => ['required', 'string'],
            'fecha_uso' => ['required', 'date'],
            'productos_usados_limpiar_producto' => ['required', 'array'],
        ];
    }
}
