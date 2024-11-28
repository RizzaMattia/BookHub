<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            "title" => "required|string",
            "description" => "max:800",
            "pages" => "",
            "author_id" => "required",
            "category_id" => "required",
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ];
    }

    public function messages(): array{
        return [
            "title.required" => "È richiesto",
            "author_id.required" => "È richiesto",
            "category.required" => "È richiesto",
            "description.max" => "Non uoi superare i :max caratteri",
            'cover_image.image' => 'Il file deve essere un\'immagine valida.',
            'cover_image.mimes' => 'L\'immagine deve essere uno dei seguenti formati: jpeg, png, jpg, gif, svg.',
            'cover_image.max' => 'L\'immagine non può superare i :max KB.'
        ];
    }
}
