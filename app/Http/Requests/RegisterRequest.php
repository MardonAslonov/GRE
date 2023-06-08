<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'surname' => 'required|max:50',
            'phone' => 'required|numeric|unique:users,phone',
            'password' => 'required|string|max:50',
        ];
    }
}
