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
        $asignaturas=DB::table('asignatura')->where('nombre_asignatura','LIKE','%'.$query.'%')
        ->where('condicion','=','1')
        ->orderBy('nombre_asignatura','asc')
        ->paginate(6);

        return view('asignatura.index',["asignaturas"=>$asignaturas,"searchText"=>$query]);
    }



   }

   public function create()
   {
     return view("asignatura.create");
   }


   public function store(AsignaturaFormRequest $request)
   {
     $asignatura=new asignatura;
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
    return view("asignatura.edit",["asignatura"=>Asignatura::findOrFail($id)]);
   }


   public function update(AsignaturaFormRequest $request, $id)
   {
    $asignatura=Asignatura::findOrFail($id);
    $asignatura->nombre_asignatura=$request->get('nombre_asignatura');

    $asignatura->update();

    return Redirect::to('asignatura');
   }

   public function destroy($id)
   {
     $asignatura=Asignatura::find($id);
     $asignatura->delete();
     return Redirect::to('asignatura');

   }
}

