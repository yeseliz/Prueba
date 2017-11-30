@extends('layouts.admin')
<?php date_default_timezone_set('America/El_Salvador'); ?>
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
		<h3> Editar Reserva: {{$reserva->dia}} </h3>
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error) 
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif

		{!!Form::model($reserva,['method'=>'PATCH','route'=>['reserva.update',$reserva->idreserva]])!!}
		{{Form::token()}}


		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label>Asignatura</label>
			<select name="idasignatura" class="form-control">
				@foreach($asignaturas as $asig)
				@if ($asig->idasignatura==$reserva->idasignatura)
				<option value="{{$asig->idasignatura}}" selected>{{$asig->nombre_asignatura}}</option>
				@else
				<option value="{{$asig->idasignatura}}">{{$asig->nombre_asignatura}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>

	<label hidden="true">Hora</label>
<input type="time" name="hora_prestamo" required value="{{date('H:i:s')}}" placeholder="hora..." hidden="true">
<label hidden="true">Fecha Solicitud Actividad</label>
<input type="date" name="fecha_solicitud" required value="{{date('Y-m-d')}}" placeholder="hora..." hidden="true">

		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label>Local</label>
			<select name="idlocal" class="form-control">
				@foreach($locales as $lo)
				@if ($lo->idlocal==$reserva->idlocal)
				<option value="{{$lo->idlocal}}" selected>{{$lo->lugar}}</option>
				@else
				<option value="{{$lo->idlocal}}">{{$lo->lugar}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
<br>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Fecha Asignacion de Actividad</label>
 	<input type="date" name="fecha_asignacion" value="{{$reserva->fecha_asignacion}}" required class="form-control">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Hora de Inicio de la Actividad</label>
 	<input type="time" name="hora_inicio" value="{{$reserva->hora_inicio}}" required class="form-control">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Hora de Finalizacion de la Actividad</label>
 	<input type="time" name="hora_fin" value="{{$reserva->hora_fin}}" required class="form-control">
</div>
</div>

		<div class="form-group">
			<button class="btn btn-success" type="submit">Guardar</button>
			<button class="btn btn-success" type="submit">Cancelar</button>
		</div>
		{!!Form::close()!!}

	</div>
</div>
@endSection