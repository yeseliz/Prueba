@extends('layouts.admin')
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


<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
	<div class="form-group">
		<label form="hora">Hora: </label>
		<input type="time" name="hora" required value="{{old('hora')}}" class="form-control" placeholder="hora...">
	</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
	<div class="form-group">
		<label form="fecha">Fecha: </label>
		<input type="date" name="fecha" required value="{{old('fecha')}}" class="form-control" placeholder="fecha...">
	</div>
</div>

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
			<button class="btn btn-success" type="submit">Guardar</button>
			<button class="btn btn-success" type="submit">Cancelar</button>
		</div>

	</div>
{!!Form::close()!!}
@endSection