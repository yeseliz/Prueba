@extends('layouts.admin')
@section('contenido')
<div class="row">
<center><h4>LISTA DE RESERVAS</h4></center>
	<div class="col-lg-8 col-md-8 col-sm-8 col-sx-12">
		<h3><center> </center><a href="reserva/create"><button class="btn btn-success" > Nueva Reserva</button></a></h3>
		@include('reserva.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Asignatura</th>
				<th>Día</th>
				<th>Hora</th>
				<th>Local</th>
				<th>Opciones</th>
				</thead>
				@foreach ($reservas as $r)
				<tr>
				<td>{{ $r->nombre_asignatura}}
				<td>{{ $r->dia}}</td>
				<td>{{ $r->hora}}</td>
				<td>{{ $r->lugar}}</td>
				<td>
				    <a href="{{URL::action('ReservaController@show',$r->idreserva)}}"><button class ="btn btn-success">Ver</button></a>
					<a href="{{URL::action('ReservaController@edit',$r->idreserva)}}"><button class ="btn btn-success">Editar</button></a>
					<a href="" data-target="#modal-delete-{{$r->idreserva}}" data-toggle="modal"><button class ="btn btn-success"> Eliminar</button></a>
				</td>
				
				</tr>
				@include('reserva.modal')
				@endforeach
			</table>
		</div>
		{{$reservas->render()}}
	</div>
</div>

@endsection