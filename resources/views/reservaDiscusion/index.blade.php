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
				<th>Asignatura</th>
				<th>Discusión</th>
				<th>Hora</th>
				<th>Fecha</th>
				<th>Local</th>
				<th>Opciones</th>
				</thead>
				@foreach ($reservas as $re)
				<tr>
				<td>{{ $re->nombre_asignatura}}</td>
				<td>{{ $re->actividad}}</td>
				<td>{{ $re->hora}}</td>
				<td>{{ $re->fecha}}</td>
				<td>{{ $re->lugar}}</td>
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