<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use tpi\Local;
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
        ->paginate(3);

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
     $local->fecha=$request->get('fecha');
     $local->hora=$request->get('hora');
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
    $local->fecha=$request->get('fecha');
    $local->hora=$request->get('hora');
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
}
