<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEnseignantRequest extends FormRequest
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
            'nom' => ['required', 'max:191', 'string'],
            'prenoms' => ['required', 'max:191', 'string'],
            'adresse' => ['required', 'max:191', 'string'],
            'telephone' => ['required', 'max:191', 'string'],
            'npi' => ['required', 'max:191', 'string'],
            'banque_id' => ['required', 'max:10', 'integer'],
            'compte' => ['required', 'max:191', 'string'],
            'ifu' => ['required', 'max:191', 'string'],
            'nationalite' => ['required', 'max:191', 'string'],
            'sexe' => ['required', 'max:191', 'string'],
            'email' => ['required', 'max:191', 'string'],
            'profession' => ['required', 'max:191', 'string'],
            'date_naissance' => ['required', 'max:191', 'date'],
        ];
    }
}
