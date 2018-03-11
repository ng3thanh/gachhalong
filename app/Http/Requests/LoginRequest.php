<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|between:3,50|email',
            'password' => 'required|between:3,50'
        ];
    }
    
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống!',
            'password.required' => 'Mật khẩu không được để trống!',
            'email.between' => 'Email phải lớn hơn :min ký tự và nhỏ hơn :max ký tự.',
            'password.between' => 'Mật khẩu phải lớn hơn :min ký tự và nhỏ hơn :max ký tự.',
            'email.email' => 'Email không đúng định dạng'
        ];
    }
}
