@extends('layouts.admin')
@section('contenido')
<div class="row">
<center><h4>LISTA DE USUARIOS</h4></center>
	<div class="col-lg-8 col-md-8 col-sm-8 col-sx-12">
		<h3><center> </center><a href="usuario/create"><button class="btn btn-success" > Nuevo </button></a></h3>
		@include('seguridad.usuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Nombre</th>
                <th>Carnet</th>
				<th>Email</th>
				<th>Opciones</th>
				</thead>
				@foreach ($usuarios as $usu)
				<tr>
				
				<td>{{ $usu->name}}</td>
				<td>{{ $usu->username}}</td>
				<td>{{ $usu->email}}</td>
				<td>
					<!--<a href="{{URL::action('UsuarioController@edit',$usu->id)}}"><button class ="btn btn-success">Editar</button></a>-->
					<a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class ="btn btn-success"> Eliminar</button></a>

				</td>
  
				</tr>
				@include('seguridad.usuario.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>

@endsection