<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
            'name'          => 'required|between:5,100',
            'menu'          => 'required',
            'price'         => 'nullable|numeric',
            'description'   => 'required',
            'information'   => 'required',
            'digital'       => 'required',
//            'main-img'      => 'mimes:jpeg,bmp,png,jpg',
//            'more-img'      => 'mimes:jpeg,bmp,png,jpg',
            'publish_time'  => 'required|string',
            'status'        => 'required'
        ];
    }
}
