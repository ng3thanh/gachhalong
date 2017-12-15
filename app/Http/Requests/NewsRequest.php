<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'news_title' => 'required|between:10,200',
            'news_menu' => 'required',
            'news_description' => 'required',
            'news_content' => 'required',
            'news_main_img' => 'required|mimes:jpeg,bmp,png,jpg',
            'news_publish_time' => 'required'
        ];
    }
}
