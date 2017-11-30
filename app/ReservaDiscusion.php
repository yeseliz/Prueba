<?php

namespace tpi;

use Illuminate\Database\Eloquent\Model;

class ReservaDiscusion extends Model
{
    protected $table='reserva_discu';
    protected $primaryKey='idreserva';
    public $timestamps=false;
    protected $fillable=[
    'idlocal',
    'idasignatura',
    'iddiscusion',
    'hora_prestamo_disc',
    'fecha_solicitud_disc',
    'fecha_asignacion_disc',
    'hora_inicio_disc',
    'hora_fin_disc',
    'estado_disc',
    ];
}
