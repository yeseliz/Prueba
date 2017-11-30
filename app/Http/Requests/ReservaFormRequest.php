<?php

namespace tpi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaFormRequest extends FormRequest
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
            'idlocal'=>'required',            
            'hora_prestamo'=>'required',
            'idasignatura'=>'required',
            'fecha_solicitud'=>'required',
            'fecha_asignacion'=>'required',
            'hora_inicio' =>'required',
            'hora_fin' =>'required'
        ];
    }
}
