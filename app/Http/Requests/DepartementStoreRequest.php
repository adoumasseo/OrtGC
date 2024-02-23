<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartementStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'max:255', 'string'],
            'nom' => ['required', 'max:255', 'string'],
            'ufr_id' => ['exists:ufrs', 'max:255', 'string'],
            'chef_departement' => ['exists:enseignants', 'max:255', 'string'],
        ];
    }
}
