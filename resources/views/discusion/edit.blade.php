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
			<label form="fecha">Fecha</label>
			<input type="date" name="fecha" required value="{{$discusion->fecha}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label form="hora">Hora</label>
			<input type="time" name="hora" required value="{{$discusion->hora}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label form="semana">Semana</label>
			<input type="number" name="semana" required value="{{$discusion->semana}}" class="form-control">
		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label>Asignatura</label>
			<select name="idasignatura" class="form-control">
				@foreach($asignaturas as $asi)
				@if ($asi->idasignatura==$discusion->iddiscusion)
				<option value="{{$asi->idasignatura}}" selected>{{$asi->nombre_asignatura}}</option>
				@else
				<option value="{{$asi->idasignatura}}">{{$asi->nombre_asignatura}}</option>
				@endif
				@endforeach
			</select>
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