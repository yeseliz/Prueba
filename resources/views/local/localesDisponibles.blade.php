@extends('layouts.admin')
<style type="text/css">
	/*.item-aula{ margin-right: 10px; margin-left: 10px; margin-top: 20px; }*/
	/*.item-aula-body{ padding-top: 1px; }*/
</style>

@section('contenido')
	@php $i = 0; $griditem = 'col-md-8'; @endphp
	@foreach($aulas as $aula)		
		@if($i >= 11) @php $griditem = 'col-md-8' @endphp @endif
		@if($aula->disponibilidad != 0) 
			@php $indicadorDisponible = "background-color: #00A65A;" @endphp
		@else 
			@php $indicadorDisponible = "background-color: #FA5858;" @endphp
		@endif
		
		<div class="panel panel-default {{$griditem}} item-aula" style="{{$indicadorDisponible}}">
			<div class="panel-heading">
				<center><strong>{{ $aula->lugar }}</strong></center>
			</div>
			<div class="panel-body item-aula-body">
				@php  $j = 0; $encontrado = 0; $encontradoDisc = 0; @endphp
				
				@foreach($reservas as $reserva)
					@if($aula->idlocal == $reserva->idlocal)
						@php $encontrado = 1; @endphp
						<strong>{{$reserva->nombre_asignatura}}</strong>
						<strong>Final: {{$reserva->hora_fin}}</strong>
						@break;
					@endif										
				@endforeach
				
				@foreach($reservasDiscusiones as $reservaDiscusion)
					@if($aula->idlocal == $reservaDiscusion->idlocal)
						@php $encontradoDisc = 1; @endphp
						<strong>{{'Discusion'}}</strong>
						<strong>{{$reservaDiscusion->nombre_asignatura}}</strong>
						<strong>Final: {{$reservaDiscusion->hora_fin_disc}}</strong>
						@break;
					@endif										
				@endforeach

				@if($encontrado == 0 && $encontradoDisc == 0)
					<strong><p>DISPONIBLE</p></strong>
				@endif
			</div>
		</div>	
		@php $i++; @endphp
	@endforeach

@endSection