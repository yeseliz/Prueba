<?php
namespace tpi\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use tpi\Local;
use tpi\Reserva;
use tpi\ReservaDiscusion;

use Illuminate\Support\Facades\Redirect;
use tpi\Http\Requests\LocalFormRequest;


class LocalController extends Controller
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
        $locales=DB::table('local')->where('lugar','LIKE','%'.$query.'%')
        ->where('condicion','=','1')
        ->orderBy('idlocal','desc')
        ->paginate(6);
        return view('local.index',["locales"=>$locales,"searchText"=>$query]);
    }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("local.create");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocalFormRequest $request)
    {
     $local=new local;
     $local->lugar=$request->get('lugar');
     $local->capacidad=$request->get('capacidad');
      $local->condicion='1';
     $local->save();
     return Redirect::to('local');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("local.show",["local"=>local::findOrFail($id)]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view("local.edit",["local"=>local::findOrFail($id)]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocalFormRequest $request, $id)
    {
    $local=local::findOrFail($id);
    $local->lugar=$request->get('lugar');
    $local->capacidad=$request->get('capacidad');
    $local->update();
    return Redirect::to('local');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $local=local::findOrFail($id);
     $local->condicion='0';
     $local->update();
     return Redirect::to('local');
    }

    public function disponibilidadAulas()
    {
        date_default_timezone_set('America/El_Salvador');        
        $reservas = Reserva::where('fecha_asignacion', '=', date("Y-m-d"))->where('estado', '<>', '0')->get();        
        //Comprobar disponibilidad de locales y vigencia de reservas de acuerdo a las reservaciones
        foreach ($reservas as $reserva)
        {
            if($reserva->hora_fin < date("H:i:s"))
            {   
                $reserva->estado = 0; $reserva->update();
                }else
                {
                    $reserva->estado = 1; $reserva->update();
                    }            

            $local = Local::findOrFail($reserva->idlocal);
            if((date("H:i:s") >= $reserva->hora_inicio) && (date("H:i:s") <= $reserva->hora_fin))
            {
                $local->disponibilidad = 0; $local->update();                
                }else
                {
                    $local->disponibilidad = 1; $local->update();                    
                    }
            }
        
        //comprobar disponibilidades de locales y vigencia de reservas de acuerdo a las discusiones
        $reservasDiscusiones = ReservaDiscusion::where('fecha_asignacion_disc', '=', date("Y-m-d"))->where('estado_disc', '<>', '0')->get();        

        foreach ($reservasDiscusiones as $reservaDiscusion)
        {
            if($reservaDiscusion->hora_fin_disc < date("H:i:s"))
            {   
                $reservaDiscusion->estado_disc = 0; $reservaDiscusion->update();
                }else
                {
                    $reservaDiscusion->estado_disc = 1; $reservaDiscusion->update();
                    }            

            $local = Local::findOrFail($reservaDiscusion->idlocal);
            if((date("H:i:s") >= $reservaDiscusion->hora_inicio_disc) && (date("H:i:s") <= $reservaDiscusion->hora_fin_disc))
            {
                $local->disponibilidad = 0; $local->update();                
                }else
                {
                    $local->disponibilidad = 1; $local->update();                    
                    }
            }


        $aulas = Local::all();
        $reservas=DB::table('reserva as r')        
        ->join('asignatura as asig', 'r.idasignatura','=','asig.idasignatura')        
        ->select('r.idreserva', 'r.idlocal', 'r.hora_fin', 'asig.nombre_asignatura', 'asig.tipo','asig.idasignatura')
        ->where('r.fecha_asignacion', '=', date("Y-m-d"))
        ->where('r.estado', '<>', '0')->get();

        $reservasDiscusiones=DB::table('reserva_discu as re')        
        ->join('asignatura as asig', 're.idasignatura','=','asig.idasignatura')        
        ->select('re.idreserva', 're.idlocal', 're.hora_fin_disc', 'asig.nombre_asignatura', 'asig.tipo','asig.idasignatura')
        ->where('re.fecha_asignacion_disc', '=', date("Y-m-d"))
        ->where('re.estado_disc', '<>', '0')->get();
        //$reservas = Reserva::where('fecha_asignacion', '=', date("Y-m-d"))->where('estado', '<>', '0')->get();        
        //return view('local/localesDisponibles', ['aulas' => $aulas]);         
        return view('local/localesDisponibles', ['aulas' => $aulas, 'reservas' => $reservas, 'reservasDiscusiones' => $reservasDiscusiones]);                
        }
    
}
?>