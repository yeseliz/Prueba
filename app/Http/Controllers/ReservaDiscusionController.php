<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use tpi\reservaDiscusion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpi\Http\Requests\ReservaDiscusionFormRequest;

class ReservaDiscusionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); 
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
        $query=trim($request->get('searchText'));
        $reservas=DB::table('reserva_discu as re')
        ->join('local as l', 're.idlocal','=','l.idlocal')
        ->join('asignatura as asig', 're.idasignatura','=','asig.idasignatura')
        ->join('discusion as d', 're.iddiscusion','=','d.iddiscusion')
        ->select('re.idreserva','re.fecha_solicitud_disc', 're.hora_prestamo_disc', 're.fecha_asignacion_disc', 're.hora_inicio_disc', 'hora_fin_disc', 'estado_disc','l.lugar', 'l.capacidad', 'asig.nombre_asignatura', 'd.actividad', 'd.fecha', 'd.fecha_fin', 'd.semana')
        ->where('asig.nombre_asignatura','LIKE','%'.$query.'%')
        ->where('re.estado_disc', '<>', '0')
        ->orderBy('re.fecha_solicitud_disc','des')
        ->orderBy('re.hora_prestamo_disc','des')
        ->paginate(10);

        return view('reservaDiscusion.index',["reservas"=>$reservas,"searchText"=>$query]);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     $discusiones=DB::table('discusion')->where('condicion','=','1')->get();
     $locales=DB::table('local')->where('condicion','=','1')->get();
     $asignaturas=DB::table('asignatura')->where('condicion','=','1')->get();
     return view("reservaDiscusion.create",["discusiones"=>$discusiones, "locales"=>$locales, "asignaturas"=>$asignaturas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(reservaDiscusionFormRequest $request)
    {
     $reserva=new reservaDiscusion;
     $reserva->idlocal=$request->get('idlocal');
     $reserva->idasignatura=$request->get('idasignatura');
     $reserva->iddiscusion=$request->get('iddiscusion');
     $reserva->hora_prestamo_disc=$request->get('hora_prestamo_disc');
     $reserva->fecha_solicitud_disc=$request->get('fecha_solicitud_disc');
     $reserva->fecha_asignacion_disc=$request->get('fecha_asignacion_disc');
     $reserva->hora_inicio_disc=$request->get('hora_inicio_disc');
     $reserva->hora_fin_disc=$request->get('hora_fin_disc');
     $reserva->estado_disc=$request->get('estado_disc');
     
     $reserva->save();
     return Redirect::to('reservaDiscusion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return view("reservaDiscusion.show",["reservaDiscusion"=>reservaDiscusion::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(reservaDiscusionFormRequest $request, $id)
    {
     $reserva=reservaDiscusion::findOrFail($id);
     $reserva->idlocal=$request->get('idlocal');
     $reserva->idasignatura=$request->get('idasignatura');
     $reserva->iddiscusion=$request->get('iddiscusion');
     $reserva->hora_prestamo_disc=$request->get('hora_prestamo_disc');
     $reserva->fecha_solicitud_disc=$request->get('fecha_solicitud_disc');
     $reserva->fecha_asignacion_disc=$request->get('fecha_asignacion_disc');
     $reserva->hora_inicio_disc=$request->get('hora_inicio_disc');
     $reserva->hora_fin_disc=$request->get('hora_fin_disc');
     $reserva->estado_disc=$request->get('estado_disc');

    $reserva->update();

    return Redirect::to('reservaDiscusion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $reserva=reservaDiscusion::findOrFail($id);
     $reserva->delete();
     return Redirect::to('reservaDiscusion');
    }

    
}
