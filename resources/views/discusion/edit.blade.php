@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
		<h3> Editar Discusión: {{$discusion->asignatura}} </h3>
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

{!!Form::model($discusion,['method'=>'PATCH','route'=>['discusion.update',$discusion->iddiscusion]])!!}
{{Form::token()}}
<div class="row">
	<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label form="actividad">Actividad</label>
			<input type="text" name="actividad" required value="{{$discusion->actividad}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label form="fecha">Fecha de inicio</label>
			<input type="date" name="fecha" required value="{{$discusion->fecha}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label form="fecha_fin">Fecha fin</label>
			<input type="date" name="fecha_fin" required value="{{$discusion->fecha_fin}}" class="form-control">
		</div>
	</div>


	<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label form="semana">N° de semana</label>
			<input type="number" name="semana" required value="{{$discusion->semana}}" class="form-control">
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