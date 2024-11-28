<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
            "name" => "required|string|unique:authors,name",
            "birthday" => "before_or_equal:today|required|date|date_format:Y-m-d",
        ];
    }

    public function messages(): array{
        return [
            "name.required" => "È richiesto",
            "name.unique" => "Esiste già un autore con questo nome.",
            "birthday.required" => "È richiesto",
            'before_or_equal' => 'La data di nascita non può essere nel futuro',
            "date_format" => "Formato data non valido"
        ];
    }
}
