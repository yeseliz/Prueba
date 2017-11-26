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
    'fecha',
    'hora'
    ];
}
