<?php

namespace tpi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalFormRequest extends FormRequest
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
            'lugar'=>'required|max:45',
            'capacidad'=>'required'
        ];
    }
}
