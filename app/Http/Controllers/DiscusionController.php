<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use tpi\Discusion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpi\Http\Requests\DiscusionFormRequest;


class DiscusionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
   public function index(Request $request)
   {
    if($request){
        $query=trim($request->get('searchText'));
        $discusiones=DB::table('discusion as d')
        ->join('asignatura as asi', 'd.idasignatura','=','asi.idasignatura')
        ->select('d.iddiscusion','d.actividad', 'd.fecha', 'd.hora', 'd.semana', 'asi.nombre_asignatura as asignatura')
        ->where('d.actividad','LIKE','%'.$query.'%')
        ->orderBy('d.iddiscusion','desc')
        ->paginate(3);

        return view('discusion.index',["discusiones"=>$discusiones,"searchText"=>$query]);
    }
   }

   public function create()
   {
     $asignaturas=DB::table('asignatura')->where('condicion','=','1')->get();
//->where('idasignatura','=','idasignatura');
     return view("discusion.create",["asignaturas"=>$asignaturas]);
   }

   public function store(DiscusionFormRequest $request)
   {
     $discusion=new discusion;
     $discusion->idasignatura=$request->get('idasignatura');
     $discusion->actividad=$request->get('actividad');
     $discusion->fecha=$request->get('fecha');
     $discusion->hora=$request->get('hora'); 
     $discusion->semana=$request->get('semana');
     $discusion->save();
     return Redirect::to('discusion');
   }

   public function show($id)
   {
    return view("discusion.show",["discusion"=>Discusion::findOrFail($id)]);
   }

   public function edit($id)
   {
    $discusion=Discusion::findOrFail($id);
    $asignaturas=DB::table('asignatura')->where('condicion','=','1')->get();
    return view("discusion.edit",["discusion"=>$discusion, "asignaturas"=>$asignaturas]);
   }

   public function update(DiscusionFormRequest $request, $id)
   {
    $discusion=Discusion::findOrFail($id);
    $discusion->idasignatura=$request->get('idasignatura');
    $discusion->actividad=$request->get('actividad');
    $discusion->fecha=$request->get('fecha');
    $discusion->hora=$request->get('hora'); 
    $discusion->semana=$request->get('semana');

    $discusion->update();

    return Redirect::to('discusion');
   }

   public function destroy($id)
   {
     $discusion=Discusion::find($id);
     $discusion->delete();
     return Redirect::to('discusion');

   }
}



