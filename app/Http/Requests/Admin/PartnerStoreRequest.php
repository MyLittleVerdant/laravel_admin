<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PartnerStoreRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'bail|required|string|max:255',
            'description' => 'bail|required|string',
            'link' => 'bail|required|string',
            'picture' => 'bail|required|mimes:jpg,jpeg,bmp,png,webp',
            'color' => 'bail|required|string',
            'sort' => 'integer',

        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Название',
            'description' => 'Описание',
            'link' => 'Сайт партнёра',
            'picture' => 'Лого',
            'color' => 'Цвет блока',
            'sort' => 'Сортировка',

        ];
    }
}
