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

		{!!Form::model($reserva,['method'=>'PATCH','route'=>['reservaDiscusion.update',$reserva->idreserva]])!!}
		{{Form::token()}}


		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label>Asignatura: </label>
			<select name="idasignatura" class="form-control">
				@foreach($asignaturas as $as)
				@if ($as->idasignatura==$reserva->idreserva)
				<option value="{{$as->idasignatura}}" selected>{{$as->nombre_asignatura}}</option>
				@else
				<option value="{{$as->idasignatura}}">{{$as->nombre_asignatura}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>
<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label form="fecha">Fecha: </label>
			<input type="date" name="fecha" class="form-control" value="{{$reserva->fecha}}" placeholder="Hora...">
		</div>
		</div>

<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label>Horario: </label>
			<select name="idhora" class="form-control">
				@foreach($horas as $hr)
				@if ($hr->idhora==$reserva->idreserva)
				<option value="{{$hr->idhora}}" selected>{{$hr->horario}}</option>
				@else
				<option value="{{$hr->idhora}}">{{$hr->horario}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label>Local: </label>
			<select name="idlocal" class="form-control">
				@foreach($locales as $l)
				@if ($l->idlocal==$reserva->idreserva)
				<option value="{{$l->idlocal}}" selected>{{$l->lugar}}</option>
				@else
				<option value="{{$l->idlocal}}">{{$l->lugar}}</option>
				@endif
				@endforeach
			</select>
		</div>
	</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-sx-12">
		<div class="form-group">
			<label>Discusion: </label>
			<select name="iddiscusion" class="form-control">
				@foreach($discusiones as $d)
				@if ($d->iddiscusion==$reserva->iddiscusion)
				<option value="{{$l->idlocal}}" selected>{{$d->actividad}}</option>
				@else
				<option value="{{$l->idlocal}}">{{$d->actividad}}</option>
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