<?php

namespace tpi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioFormRequest extends FormRequest
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
       return [
            'name' => 'required|max:255',
            //'email' => 'required|email|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users,id'.$this->id,﻿
            'password' => 'required|min:6|confirmed',
        ];
    }
}
