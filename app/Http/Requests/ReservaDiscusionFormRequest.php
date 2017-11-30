<?php

namespace tpi\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservaDiscusionFormRequest extends FormRequest
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
            'idasignatura'=>'required',
            'iddiscusion'=>'required',
            'fecha_solicitud_disc'=>'required',
            'hora_prestamo_disc'=>'required',
            'fecha_asignacion_disc'=>'required',
            'hora_inicio_disc'=>'required',
            'hora_fin_disc'=>'required'            
        ];
    }
}
