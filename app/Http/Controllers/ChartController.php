<?php

namespace tpi\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use tpi\Reserva;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pastel = DB::table('reserva as r')
        ->join('local as loc', 'r.idlocal','=','loc.idlocal')
        ->select('r.idreserva','r.fecha_solicitud', 'r.hora_prestamo','loc.lugar', 'loc.idlocal')
       // ->count();
        ->get();

//->select(DB::raw('count(*) as reserva_count, idlocal'))
        //$pastel=Reserva::
        //select('')




       // select('reserva.idlocal', 'reserva.idhora')->get();
        //join('reserva', 'idreserva','=','idlocal')->get();
               return view('chart',['pastel'=>$pastel]);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
