<?php

namespace tpi;

use Illuminate\Database\Eloquent\Model;

class Discusion extends Model
{
    protected $table='discusion';
    protected $primaryKey='iddiscusion';
    public $timestamps=false;
    protected $fillable=[
    'actividad',
    'fecha'
    'hora',
    'semana'
    ]

}
