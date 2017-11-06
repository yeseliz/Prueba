<?php

namespace tpi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscusionFormRequest extends FormRequest
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
            'idasignatura'=>'required',
            'actividad'=>'required|max:50',
            'fecha'=>'required',
            'hora'=>'required',
            'semana'=>'required|max:2'
        ];
    }
}
