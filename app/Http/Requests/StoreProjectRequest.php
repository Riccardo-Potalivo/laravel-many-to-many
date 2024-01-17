<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => 'required|max:150|unique:projects',
            'name' => 'required|max:200|unique:projects',
            'description' => 'nullable',
            'repository' => 'required|url|max:255',
            'image' => 'nullable|mimes:jpg,png|max:1000',
            'type_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'title.max' => 'Il titolo non può avere più di :max caratteri',
            'title.unique' => 'Questo titolo esiste già',
            'name.required' => 'Il nome della repository è obbligatorio',
            'name.max' => 'Il nome della repository non può avere più di :max caratteri',
            'name.unique' => 'Esiste già una reporitory con lo stesso nome',
            'repository.url' => 'il link della rapository deve essere di tipo url',
            'image.mimes' => 'il file deve essere di tipo .jpg o .png',
            'image.max' => 'il file può pesare massimo :max Mb',
            'type_id' => 'Seleziona il campo type'
        ];

    }
}
