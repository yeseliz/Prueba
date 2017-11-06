<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use tpi\Asignatura;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpi\Http\Requests\AsignaturaFormRequest;

class AsignaturaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

   public function index(Request $request)
   {
    if($request){
        $query=trim($request->get('searchText'));
        $asignaturas=DB::table('asignatura as a')
        ->join('local as l', 'a.idlocal','=','l.idlocal')
        ->select('a.idasignatura','a.nombre_asignatura', 'a.condicion', 'l.lugar as local', 'l.hora', 'l.fecha', 'l.capacidad')
        ->where('a.nombre_asignatura','LIKE','%'.$query.'%')
        ->orderBy('a.idasignatura','desc')
        ->paginate(3);

        return view('asignatura.index',["asignaturas"=>$asignaturas,"searchText"=>$query]);
    }
   }

   public function create()
   {
     $locales=DB::table('local')->where('condicion','=','1')->get();
     return view("asignatura.create",["locales"=>$locales]);
   }

   public function store(AsignaturaFormRequest $request)
   {
     $asignatura=new asignatura;
     $asignatura->idlocal=$request->get('idlocal');
     $asignatura->nombre_asignatura=$request->get('nombre_asignatura');
     $asignatura->condicion='1';
     $asignatura->save();
     return Redirect::to('asignatura');
   }

   public function show($id)
   {
    return view("asignatura.show",["asignatura"=>Asignatura::findOrFail($id)]);
   }

   public function edit($id)
   {
    $asignatura=Asignatura::findOrFail($id);
    $locales=DB::table('local')->where('condicion','=','1')->get();
    return view("asignatura.edit",["asignatura"=>$asignatura, "locales"=>$locales]);
   }

   public function update(AsignaturaFormRequest $request, $id)
   {
    $asignatura=Asignatura::findOrFail($id);
    $asignatura->idlocal=$request->get('idlocal');
    $asignatura->nombre_asignatura=$request->get('nombre_asignatura');

    $asignatura->update();

    return Redirect::to('asignatura');
   }

   public function destroy($id)
   {
     $asignatura=Asignatura::find($id);
     $asignatura->condicion='0';
     $asignatura->delete();
     return Redirect::to('asignatura');

   }
}
