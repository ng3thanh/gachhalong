<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
            'menu-name' => 'required|between:5,100|unique:menus,name',
            'menu-menu' => 'required',
            'menu-description' => 'required',
            'menu-main-img' => 'required|mimes:jpeg,bmp,png',
        ];
    }
}
