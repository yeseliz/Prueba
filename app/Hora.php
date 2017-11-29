<?php

namespace tpi;

use Illuminate\Database\Eloquent\Model;

class Hora extends Model
{
    protected $table='hora';
    protected $primaryKey='idhora';
    public $timestamps=false;
    protected $fillable=[
    'horario',
    'condicion'
    ];
}
