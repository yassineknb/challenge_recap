<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        // On met true pour que tout le monde puisse valider pour l'instant
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|integer|min:1',
            'price' => 'required|numeric|gt:0', // gt:0 = greater than 0
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // 2MB max
        ];
    }
}