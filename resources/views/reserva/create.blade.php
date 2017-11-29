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
 <option value="{{$asig->idasignatura}}" disabled="true">{{$asig->tipo}}</option>
 <option value="" disabled="disabled">──────────────────────────────────────────────────────</option>
 @endforeach
 </select>
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
 <label>Horario: </label>
 <select name="idhora" class="form-control">
 @foreach($horas as $h)


 <option value="{{$h->idhora}}">{{$h->horario}}</option>
 
 @endforeach

 </select>
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