<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check;

    }
    public function rules():array{
        return [
            'start_time'=>'required|date|after:now',
            'end_time'=>'required|date|after:start_time',
            'services'=>'required|array',
            'services.*'=>'required|integer|exists:services,id',
        ];

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'start_time.required' => 'L\heure de debut est obligatoire','start_time.after'=>'la reservation ne peut pas etre dans le passe.',
            'services.required'=>'vous devez selectionner au moins un service',
            'services.*.exists'=>'le service selectionne n_est pas valide'
        ];
    }
}
