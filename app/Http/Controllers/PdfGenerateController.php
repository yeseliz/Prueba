<?php

namespace tpi\Http\Controllers;

use Illuminate\Http\Request;
use tpi\Reserva;
use PDF;

class PdfGenerateController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function downloadPDF()
    {
    	$reservas=Reserva::all();
    	$pdf = PDF::loadView('pdf', ['reservas'=>$reservas]);
		return $pdf->download('reservas.pdf');
    }
}
