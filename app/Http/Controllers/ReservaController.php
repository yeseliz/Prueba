<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use tpi\Reserva;
use Illuminate\Support\Facades\Redirect;
use tpi\Http\Requests\ReservaFormRequest;

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
        ->select('r.idreserva','r.fecha', 'r.hora', 'loc.fecha', 'loc.hora', 'loc.lugar as local', 'loc.capacidad')
        ->where('r.fecha','LIKE','%'.$query.'%')
        ->orderBy('r.idreserva','desc')
        ->paginate(3);

        return view('reserva.index',["reservas"=>$reservas,"searchText"=>$query]);
    }
   }

   public function create()
   {
     $locales=DB::table('local')->where('condicion','=','1')->get();
     return view("reserva.create",["locales"=>$locales]);
   }

   public function store(reservaFormRequest $request)
   {
     $reserva=new reserva;
     $reserva->idlocal=$request->get('idlocal');
     $reserva->fecha=$request->get('fecha');
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
    return view("reserva.edit",["reserva"=>$reserva, "locales"=>$locales]);
   }

   public function update(reservaFormRequest $request, $id)
   {
    $reserva=reserva::findOrFail($id);
     $reserva->idlocal=$request->get('idlocal');
     $reserva->fecha=$request->get('fecha');
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
