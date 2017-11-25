@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
		<h3> Editar Asignatura: {{$asignatura->nombre_asignatura}} </h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error) 
				<li>{{$error}}</li>
				@endforeach 
			</ul>
		</div>
		@endif
	</div>
</div>

{!!Form::model($asignatura,['method'=>'PATCH','route'=>['asignatura.update',$asignatura->idasignatura]])!!}
{{Form::token()}}
<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label form="nombre_asignatura">Asignatura</label>
			<input type="text" name="nombre_asignatura" required value="{{$asignatura->nombre_asignatura}}" class="form-control">
		</div>
	</div>

	
	<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<button class="btn btn-success" type="submit">Guardar</button>
			<button class="btn btn-success" type="submit">Cancelar</button>
		</div>

	</div>
</div>



{!!Form::close()!!}


@endSection