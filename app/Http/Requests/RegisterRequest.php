<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:7',
            'surname' => 'required|max:50',
            'phone' => 'required|max:13|min:13|unique:users,phone',
            // 'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|string|max:50',
        ];
    }
}
