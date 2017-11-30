@extends('layouts.admin')
<?php date_default_timezone_set('America/El_Salvador'); ?>
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
		<h3> Nueva reserva </h3>
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
		{!!Form::open(array('url'=>'reserva','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Asignatura</label>
 <select name="idasignatura" class="form-control">
 @foreach($asignaturas as $asig)
 <option value="{{$asig->idasignatura}}">{{$asig->nombre_asignatura}}</option>
 <option value="{{$asig->idasignatura}}" disabled="true">{{$asig->tipo}}</option>
 <option value="" disabled="disabled">──────────────────────────────────────────────────────</option>
 @endforeach
 </select> 
</div>
</div>

<label hidden="true">Hora</label>
<input type="time" name="hora_prestamo" required value="{{date('H:i:s')}}" placeholder="hora..." hidden="true">
<label hidden="true">Fecha Solicitud Actividad</label>
<input type="date" name="fecha_solicitud" required value="{{date('Y-m-d')}}" placeholder="hora..." hidden="true">
<label hidden="true">Estado</label>
<input type="number" name="estado" required value="1" placeholder="estado" hidden="true">

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Local</label>
 <select name="idlocal" class="form-control">
 @foreach($locales as $lo)
 <option value="{{$lo->idlocal}}">{{$lo->lugar}}</option>
 @endforeach
 </select>
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Fecha Asignacion de Actividad</label>
 	<input type="date" name="fecha_asignacion" required class="form-control">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Hora de Inicio de la Actividad</label>
 	<input type="time" name="hora_inicio" required class="form-control">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Hora de Finalizacion de la Actividad</label>
 	<input type="time" name="hora_fin" required class="form-control">
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<button class="btn btn-success" type="submit">Guardar</button>
			<button class="btn btn-success" type="submit">Cancelar</button>
		</div>

	</div>
{!!Form::close()!!}
@endSection