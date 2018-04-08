<?php

namespace App\Http\Requests\Api;

class CaptchaRequest extends FormRequest
{
    public function rules()
    {
        return [
            'phone' => 'required|regex:/^1[34578]\d{9}$/|unique:users',
        ];
    }
}
