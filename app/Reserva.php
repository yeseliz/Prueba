<?php

namespace tpi;
use tpi\Local;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $table='reserva';
    protected $primaryKey='idreserva';
    public $timestamps=false;
    protected $fillable=[
    'idlocal',    
    'idasignatura',
    'iddiscusion',
    'fecha_solicitud',
    'hora_prestamo',
    'fecha_asignacion',
    'hora_inicio',
    'hora_fin',
    'estado',
    ];

   public function locales()
   {
      // hasmany - tiene muchas
      return $this->belongsto(Local::class);
   }
/*
    public function local(){
        return $this=>belongsTo('Local');
    }

    public function asignatura(){
        return $this=>belongsTo('Asignatura');
    }

    public function discusion(){
        return $this=>belongsTo('Discusion');
    }*/
}
