@extends('layouts.admin')
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
 @endforeach
 </select>
</div>
</div>



<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
<div class="form-group">
<label form="dia">Día</label>
<br>
<select name="dia" class="form-control">
  <option value="Lunes">Lunes</option>
  <option value="Martes">Martes</option>
  <option value="Miercoles">Miércoles</option>
  <option value="Jueves">Jueves</option>
   <option value="Viernes">Viernes</option>
  <option value="Sabado">Sábado</option>
  <option value="Domingo">Domingo</option>
</select>
	</div>
</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
	<div class="form-group">
		<label form="hora">Hora</label>
		<input type="time" name="hora" required value="{{old('hora')}}" class="form-control" placeholder="hora...">
	</div>
</div>

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
			<button class="btn btn-success" type="submit">Guardar</button>
			<button class="btn btn-success" type="submit">Cancelar</button>
		</div>

	</div>
{!!Form::close()!!}
@endSection