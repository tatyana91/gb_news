<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:5|max:20'
        ];
    }

    public function attributes(): array
    {
        return [
            'title' => 'Название категории'
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Ты забыл заполнить ":attribute"',
            'title.min' => 'Слишком короткое значение для ":attribute"',
        ];
    }
}
