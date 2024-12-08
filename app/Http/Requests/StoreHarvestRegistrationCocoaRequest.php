<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreHarvestRegistrationCocoaRequest extends FormRequest
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
            'fecha' => ['required', 'date'],
            'cantidad_mazorcas' => ['required', 'integer'],
            'qq_baba_cacao' => ['required', 'integer'],
            'precio_qq' => ['required', 'numeric'],
        ];
    }
}
