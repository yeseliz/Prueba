<?php

namespace tpi;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table='asignatura';
    protected $primaryKey='idasignatura';
    public $timestamps=false;
    protected $fillable=[
    'idlocal',
    'nombre_asignatura',
    'estado',
    'condicion'
    
    ];
}
