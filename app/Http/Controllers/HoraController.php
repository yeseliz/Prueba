<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\DB;
use tpi\Hora;
use Illuminate\Support\Facades\Redirect;
use tpi\Http\Requests\HoraFormRequest;

class HoraController extends Controller
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
        $horas=DB::table('hora')->where('horario','LIKE','%'.$query.'%')
        ->where('condicion','=','1')
        ->orderBy('idhora','asc')
        ->paginate(6);

        return view('hora.index',["horas"=>$horas,"searchText"=>$query]);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("hora.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(horaFormRequest $request)
    {
     $hora=new hora;
     $hora->horario=$request->get('horario');
     $hora->condicion='1';
     $hora->save();
     return Redirect::to('hora');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("hora.show",["hora"=>hora::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         return view("hora.edit",["hora"=>hora::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(horaFormRequest $request, $id)
    {
    $hora=hora::findOrFail($id);
    $hora->horario=$request->get('horario');
    
    $hora->update();

    return Redirect::to('hora');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $hora=hora::findOrFail($id);
     $hora->condicion='0';
     $hora->delete();
     return Redirect::to('hora');

    }

    
}


