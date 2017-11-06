@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-6 col-sx-6">
		<h3> Editar Reserva: {{$reserva->fecha}} </h3>
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

		<div class="form-group">
			<label form="fecha">Fecha</label>
			<input type="date" name="fecha" class="form-control" value="{{$reserva->fecha}}" placeholder="Fecha...">
		</div>

		<div class="form-group">
			<label form="hora">Hora</label>
			<input type="time" name="hora" class="form-control" value="{{$reserva->hora}}" placeholder="Hora...">
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label>Local</label>
			<select name="idlocal" class="form-control">
				@foreach($locales as $lo)
				@if ($lo->idlocal==$reserva->idreserva)
				<option value="{{$lo->idlocal}}" selected>{{$lo->lugar}}</option>
				@else
				<option value="{{$lo->idlocal}}">{{$lo->lugar}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
<br>
		<div class="form-group">
			<button class="btn btn-success" type="submit">Guardar</button>
			<button class="btn btn-success" type="submit">Cancelar</button>
		</div>
		{!!Form::close()!!}

	</div>
</div>
@endSection