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
        ->select('r.idreserva', 'r.hora_prestamo', 'r.hora_inicio', 'r.hora_fin', 'r.estado', 'r.fecha_asignacion', 'r.fecha_solicitud','loc.lugar', 'loc.capacidad', 'as.nombre_asignatura', 'as.tipo')
        ->where('as.nombre_asignatura','LIKE','%'.$query.'%')
        ->where('r.estado', '<>', '0')
        ->orderBy('r.fecha_solicitud','des')
        ->orderBy('r.hora_prestamo','des')
        ->paginate(10);
        //->select('r.idreserva','r.dia', 'r.hora_prestamo','loc.lugar', 'loc.capacidad', 'as.nombre_asignatura', 'as.tipo')
        //->orderBy('as.nombre_asignatura','asc')
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
     $local = Local::findOrFail($reserva->idlocal);
     $local->cantidad_prestamos = $local->cantidad_prestamos+1;
     $local->update();
     $reserva->idasignatura=$request->get('idasignatura');     
     $reserva->hora_prestamo=$request->get('hora_prestamo');     
     $reserva->fecha_solicitud = $request->get("fecha_solicitud");     
     $reserva->fecha_asignacion = $request->get("fecha_asignacion");
     $reserva->hora_inicio=$request->get('hora_inicio');
     $reserva->hora_fin=$request->get('hora_fin');
     $reserva->estado=$request->get('estado');     
     $reserva->save();
     return Redirect::to('reserva');
   }
   public function show($id)
   {
    //return view("reserva.show",["reserva"=>reserva::findOrFail($id)]);
    $reserva=reserva::findOrFail($id);
    $view=view('reserva.show', compact('reserva'));
    $pdf=\App::make('dompdf.wrapper');
    return $pdf->stream('reserva');
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
     $local->cantidad_prestamos = $local->cantidad_prestamos+1;
     $local->update();
     $reserva->idasignatura=$request->get('idasignatura');     
     $reserva->hora_prestamo=$request->get('hora_prestamo');     
     $reserva->fecha_solicitud = $request->get("fecha_solicitud");     
     $reserva->fecha_asignacion = $request->get("fecha_asignacion");
     $reserva->hora_inicio=$request->get('hora_inicio');
     $reserva->hora_fin=$request->get('hora_fin');
     $estadotemp=$this->estadoReserva($reserva->hora_fin, $reserva->fecha_asignacion);

     $reserva->estado = $estadotemp;
    $reserva->update();
    return Redirect::to('reserva');
   }
   public function destroy($id)
   {
     $reserva=reserva::findOrFail($id);
     $reserva->delete();
     return Redirect::to('reserva');
   }
   public function mostrar()
    {
        return view("reserva.grafico");
    }



    public function estadoReserva($horafinal, $fechaasignacion)
    {
      date_default_timezone_set('America/El_Salvador');
      $estado_reserva = 1;
      if(($fechaasignacion == date("Y-m-d")) && ($horafinal < date("H:i:s")))
      {
        $estado_reserva = 0;
        }

      return $estado_reserva;
      }
}