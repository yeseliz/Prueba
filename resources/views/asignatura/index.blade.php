@extends('layouts.admin')
@section('contenido')
<div class="row">
<center><h4>LISTA DE ASIGNATURAS</h4></center>
	<div class="col-lg-8 col-md-8 col-sm-8 col-sx-12">
		<h3><center> </center><a href="asignatura/create"><button class="btn btn-success" > Nueva Asignatura</button></a></h3>
		@include('asignatura.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Asignatura</th>
				<th>Opciones</th>
				</thead>
				@foreach ($asignaturas as $a)
				<tr>
				<td>{{ $a->nombre_asignatura}}</td>
			
				<td>
					<a href="{{URL::action('AsignaturaController@edit',$a->idasignatura)}}"><button class ="btn btn-success">Editar</button></a>
					<a href="" data-target="#modal-delete-{{$a->idasignatura}}" data-toggle="modal"><button class ="btn btn-success"> Eliminar</button></a>

				</td>
  
				</tr>
				@include('asignatura.modal')
				@endforeach
			</table>
		</div>
		{{$asignaturas->render()}}
	</div>
</div>

@endsection