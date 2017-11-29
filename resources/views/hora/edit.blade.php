@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
		<h3> Editar hora: {{$hora->horario}} </h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error) 
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($hora,['method'=>'PATCH','route'=>['hora.update',$hora->idhora]])!!}
		{{Form::token()}}
		<div class="form-group">
			<label form="horario">Horario: </label>
			<input type="text" name="horario" class="form-control" value="{{$hora->horario}}" placeholder="hora...">
		</div>


		<div class="form-group">
			<button class="btn btn-success" type="submit">Guardar</button>
			<button class="btn btn-success" type="submit">Cancelar</button>
		</div>
		{!!Form::close()!!}

	</div>
</div>
@endSection