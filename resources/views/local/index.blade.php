@extends('layouts.admin')
@section('contenido')
<div class="row">
<center><h4>LISTA DE LOCALES</h4></center>
	<div class="col-lg-8 col-md-8 col-sm-8 col-sx-12">
		<h3><center> </center><a href="local/create"><button class="btn btn-success" > Nuevo </button></a></h3>
		@include('local.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Local</th>
				<th>Capacidad</th>
				<th>Opciones</th>
				</thead>
				@foreach ($locales as $lo)
				<tr>
				
				<td>{{ $lo->lugar}}</td>
				<td>{{ $lo->capacidad}}</td>
				<td>
					<a href="{{URL::action('LocalController@edit',$lo->idlocal)}}"><button class ="btn btn-success">Editar</button></a>
					<a href="" data-target="#modal-delete-{{$lo->idlocal}}" data-toggle="modal"><button class ="btn btn-success"> Eliminar</button></a>

				</td>
  
				</tr>
				@include('local.modal')
				@endforeach
			</table>
		</div>
		{{$locales->render()}}
	</div>
</div>

@endsection