<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use tpi\Discusion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use tpi\Http\Requests\DiscusionFormRequest;
use tpi\Http\Requests\AsignaturaFormRequest;
use tpi\Http\Controllers\Asignatura;


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
        $discusiones=DB::table('discusion')->where('actividad','LIKE','%'.$query.'%')
        ->where('condicion', '=', '1')
        ->orderBy('semana','asc')
        ->paginate(6);

        return view('discusion.index',["discusiones"=>$discusiones,"searchText"=>$query]);
    }
   }


   public function create()
   {
     return view("discusion.create");
   }


   public function store(DiscusionFormRequest $request)
   {
     $discusion=new Discusion;
     $discusion->actividad=$request->get('actividad');
     $discusion->fecha=$request->get('fecha');
     $discusion->fecha_fin=$request->get('fecha_fin');
     $discusion->semana=$request->get('semana');
     $discusion->condicion='1';
     $discusion->save();
     return Redirect::to('discusion');
   }


   public function show($id)
   {
    return view("discusion.show",["discusion"=>Discusion::findOrFail($id)]);
   }

   public function edit($id)
   {
   return view("discusion.edit",["discusion"=>Discusion::findOrFail($id)]);
   }

   public function update(DiscusionFormRequest $request, $id)
   {
    $discusion=Discusion::findOrFail($id);
    $discusion->actividad=$request->get('actividad');
    $discusion->fecha=$request->get('fecha');
    $discusion->fecha_fin=$request->get('fecha_fin');
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



