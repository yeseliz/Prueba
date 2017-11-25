<?php

namespace tpi;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    protected $table='local';
    protected $primaryKey='idlocal';
    public $timestamps=false;
    protected $fillable=[
    'lugar',
    'capacidad',
    'condicion'
    ];
}
