<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;
use tpi\User;
use Illuminate\Support\Facades\Redirect;
use tpi\Http\Requests\UsuarioFormRequest;
use Illuminate\Support\Facades\DB; 



class UsuarioController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
      if($request){
        $query=trim($request->get('searchText'));
        $usuarios=DB::table('users')->where('name','LIKE','%'.$query.'%')
        ->orderBy('id','desc')
        ->paginate(3);
        return view('seguridad.usuario.index',["usuarios"=>$usuarios, "searchText"=>$query]);
      }
    }

    public function create(){
      return view("seguridad.usuario.create");
    }

    public function store(Request $request){
       $this->validate($request,[
            'name' => 'required|string|max:100',
            'username' => 'required|max:75|regex:/^([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-])+((\s*)+([0-9a-zA-ZñÑáéíóúÁÉÍÓÚ_-]*)*)+$/',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            
            
        ]);
     try{

        $usuario=new User;
      $usuario->name=$request->name;
        $usuario->username=$request->username;
      $usuario->email=$request->email;
      $usuario->password=bcrypt($request->password);
      $usuario->save();
      return Redirect::to('seguridad/usuario');
         }
     catch(Exception $e){

     }
    }

    public function edit($id){
      return view("seguridad.usuario.edit", ["usuario"=>User::findOrFail($id)]);
    }

    public function update(Request $request, $id){
      $usuario=User::findOrFail($id);
      $usuario->name=$request->get('name');
        $usuario->username=$request->get('username');
        $usuario->email=$request->get('email');
      $usuario->password=bcrypt($request->get('password'));
      $usuario->update();
      return Redirect::to('seguridad/usuario');
    }

    public function destroy($id){
      $usuario=DB::table('users')->where('id','=',$id)->delete();
      return Redirect::to('seguridad/usuario');
    }
}
