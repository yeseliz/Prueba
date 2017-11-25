<?php

namespace tpi;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table='reserva';
    protected $primaryKey='idreserva';
    public $timestamps=false;
    protected $fillable=[
    'idlocal',
    'idasignatura',
    'fecha',
    'hora'
    ];
}
