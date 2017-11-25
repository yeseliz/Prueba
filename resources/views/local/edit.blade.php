@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
		<h3> Editar Local: {{$local->lugar}} </h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error) 
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($local,['method'=>'PATCH','route'=>['local.update',$local->idlocal]])!!}
		{{Form::token()}}
		<div class="form-group">
			<label form="lugar">Local</label>
			<input type="text" name="lugar" class="form-control" value="{{$local->lugar}}" placeholder="Local...">
		</div>

		<div class="form-group">
			<label form="capacidad">Capacidad</label>
			<input type="number" name="capacidad" class="form-control" value="{{$local->capacidad}}" placeholder="Capacidad...">
		</div>

		<div class="form-group">
			<button class="btn btn-success" type="submit">Guardar</button>
			<button class="btn btn-success" type="submit">Cancelar</button>
		</div>
		{!!Form::close()!!}

	</div>
</div>
@endSection