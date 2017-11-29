@extends('layouts.admin')
@section('contenido')
<div class="row">
<center><h4>LISTA DE HORARIOS</h4></center>
	<div class="col-lg-8 col-md-8 col-sm-8 col-sx-12">
		<h3><center> </center><a href="hora/create"><button class="btn btn-success" > Nuevo </button></a></h3>
		@include('hora.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-sx-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
				<th>Horario</th>
				<th>Opciones</th>
				</thead>
				@foreach ($horas as $ho)
				<tr>
				
				<td>{{ $ho->horario}}</td>
				<td>
					<a href="{{URL::action('HoraController@edit',$ho->idhora)}}"><button class ="btn btn-success">Editar</button></a>
					<a href="" data-target="#modal-delete-{{$ho->idhora}}" data-toggle="modal"><button class ="btn btn-success"> Eliminar</button></a>

				</td>
  
				</tr>
				@include('hora.modal')
				@endforeach
			</table>
		</div>
		{{$horas->render()}}
	</div>
</div>

@endsection