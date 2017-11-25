@extends('layouts.admin')
@section('contenido')
<div class="row">
<center><h4>LISTA DE DISCUSIONES</h4></center>
	<div class="col-lg-8 col-md-8 col-sm-8 col-sx-12">
		<h3><center> </center><a href="discusion/create"><button class="btn btn-success" > Nueva Discusión</button></a></h3>
		@include('discusion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Actividad</th>
				<th>Fecha de Inicio</th>
				<th>Fecha de Finalización</th>
				<th>N° de semana</th>
				<th>Opciones</th>
				</thead>
				@foreach ($discusiones as $d)
				<tr>
				<td>{{ $d->actividad}}</td>
				<td>{{ $d->fecha}}</td>
				<td>{{ $d->fecha_fin}}</td>
				<td>{{ $d->semana}}</td>
				<td>
					<a href="{{URL::action('DiscusionController@edit',$d->iddiscusion)}}"><button class ="btn btn-success">Editar</button></a>
					<a href="" data-target="#modal-delete-{{$d->iddiscusion}}" data-toggle="modal"><button class ="btn btn-success"> Eliminar</button></a>

				</td>
  
				</tr>
				@include('discusion.modal')
				@endforeach
			</table>
		</div>
		{{$discusiones->render()}}
	</div>
</div>

@endsection