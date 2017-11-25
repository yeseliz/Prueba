<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use tpi\Reserva;
use Illuminate\Support\Facades\Redirect;
use tpi\Http\Requests\ReservaFormRequest;
use tpi\Http\Requests\LocalFormRequest;
use tpi\Http\Requests\AsignaturaFormRequest;
use tpi\Local;
use tpi\Asignatura;

class ReservaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); 
    }

   public function index(Request $request)
   {
    if($request){
        $query=trim($request->get('searchText'));
        $reservas=DB::table('reserva as r')
        ->join('local as loc', 'r.idlocal','=','loc.idlocal')
        ->join('asignatura as as', 'r.idasignatura','=','as.idasignatura')
        ->select('r.idreserva','r.dia', 'r.hora','loc.lugar', 'loc.capacidad', 'as.nombre_asignatura')
        ->where('as.nombre_asignatura','LIKE','%'.$query.'%')
        ->orderBy('as.nombre_asignatura','asc')
        ->paginate(6);

        return view('reserva.index',["reservas"=>$reservas,"searchText"=>$query]);
    }
   }

   public function create()
   {
     $locales=DB::table('local')->where('condicion','=','1')->get();
     $asignaturas=DB::table('asignatura')->where('condicion','=','1')->get();
     return view("reserva.create",["locales"=>$locales, "asignaturas"=>$asignaturas]);
   }

   public function store(reservaFormRequest $request)
   {
     $reserva=new reserva;
     $reserva->idlocal=$request->get('idlocal');
     $reserva->idasignatura=$request->get('idasignatura');
     $reserva->dia=$request->get('dia');
     $reserva->hora=$request->get('hora');
     $reserva->save();
     return Redirect::to('reserva');
   }

   public function show($id)
   {
    return view("reserva.show",["reserva"=>reserva::findOrFail($id)]);
   }

   public function edit($id)
   {
    $reserva=reserva::findOrFail($id);
    $locales=DB::table('local')->where('condicion','=','1')->get();
    $asignaturas=DB::table('asignatura')->where('condicion','=','1')->get();
    return view("reserva.edit",["reserva"=>$reserva, "locales"=>$locales, "asignaturas"=>$asignaturas]);
   }

   public function update(reservaFormRequest $request, $id)
   {
    $reserva=reserva::findOrFail($id);
     $reserva->idlocal=$request->get('idlocal');
     $reserva->idasignatura=$request->get('idasignatura');
     $reserva->dia=$request->get('dia');
     $reserva->hora=$request->get('hora');

    $reserva->update();

    return Redirect::to('reserva');
   }

   public function destroy($id)
   {
     $reserva=reserva::findOrFail($id);
     $reserva->delete();
     return Redirect::to('reserva');

   }
}
