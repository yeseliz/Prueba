@extends('layouts.admin') 
<?php date_default_timezone_set('America/El_Salvador'); ?>
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
		<h3> Nueva reserva de discusión con actividad programada </h3>
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
		{!!Form::open(array('url'=>'reservaDiscusion','method'=>'POST','autocomplete'=>'off'))!!}
		{{Form::token()}}

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Asignatura: </label>
 <select name="idasignatura" class="form-control">
 @foreach($asignaturas as $asig)
 <option value="{{$asig->idasignatura}}">{{$asig->nombre_asignatura}}</option>
 @endforeach
 </select>
</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Discusión: </label>
 <select name="iddiscusion" class="form-control">
 @foreach($discusiones as $d)
 <option value="{{$d->iddiscusion}}">{{$d->actividad}}</option>
 @endforeach
 </select>
</div>
</div>

<label hidden="true">Hora Prestamo para Discusion</label>
<input type="time" name="hora_prestamo_disc" required value="{{date('H:i:s')}}" placeholder="hora..." hidden="true">
<label hidden="true">Fecha Solicitud Discusion</label>
<input type="date" name="fecha_solicitud_disc" required value="{{date('Y-m-d')}}" placeholder="hora..." hidden="true">
<label hidden="true">Estado Discusion</label>
<input type="number" name="estado_disc" required value="1" placeholder="estado" hidden="true">

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
 <div class="form-group">
 <label>Local: </label>
 <select name="idlocal" class="form-control">
 @foreach($locales as $l)
 <option value="{{$l->idlocal}}">{{$l->lugar}}</option>
 @endforeach
 </select>
</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
	<div class="form-group">
		<label form="fecha_asignacion_disc">Fecha Asignacion: </label>
		<input type="date" name="fecha_asignacion_disc" required value="{{old('fecha_asignacion_disc')}}" class="form-control" placeholder="fecha...">
	</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
	<div class="form-group">
		<label form="hora_inicio_disc">Hora Inicio: </label>
		<input type="time" name="hora_inicio_disc" required value="{{old('hora_inicio_disc')}}" class="form-control" placeholder="hora...">
	</div>
</div>


<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
	<div class="form-group">
		<label form="hora_fin_disc">Hora Fin: </label>
		<input type="time" name="hora_fin_disc" required value="{{old('hora_fin_disc')}}" class="form-control" placeholder="hora...">
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