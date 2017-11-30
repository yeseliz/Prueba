@extends('layouts.admin') 
@section('contenido')
<div class="row">
<center><h4>LISTA DE RESERVAS DE DISCUSIÓN PROGRAMADAS</h4></center>
	<div class="col-lg-8 col-md-8 col-sm-8 col-sx-12">
		<h3><center> </center><a href="reservaDiscusion/create"><button class="btn btn-success" > Nueva Reserva</button></a></h3>
		@include('reservaDiscusion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Local</th>
				<th>Asignatura</th>
				<th>Discusión</th>				
				<th>Fecha Prestamo</th>
				<th>Hora Prestamo</th>			
				<th>Fecha Apartada</th>
				<th>Hora Inicio</th>
				<th>Hora Fin</th>
				<th>Opciones</th>
				</thead>
				@foreach ($reservas as $re)
				<tr>				
				<td>{{ $re->lugar}}</td>
				<td>{{ $re->nombre_asignatura}}</td>
				<td>{{ $re->actividad}}</td>
				<td>{{ $re->fecha_solicitud_disc}}</td>
				<td>{{ $re->hora_prestamo_disc}}</td>
				<td>{{ $re->fecha_asignacion_disc}}</td>
				<td>{{$re->hora_inicio_disc}}</td>
				<td>{{$re->hora_fin_disc}}</td>
				<td>
					<a href="{{URL::action('ReservaDiscusionController@edit',$re->idreserva)}}"></a>
					<a href="" data-target="#modal-delete-{{$re->idreserva}}" data-toggle="modal"><button class ="btn btn-success"> Eliminar</button></a>

				</td>
  
				</tr>
				@include('reservaDiscusion.modal')
				@endforeach
			</table>
		</div>
		{{$reservas->render()}}
	</div>
</div>

@endsection