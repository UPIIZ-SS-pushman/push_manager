@extends('layout')
@section('title')
PushManager - Crear notificación (3/4)
@stop
@section('style')
<!-- <link rel="stylesheet" href="{{ URL::asset('template/css/lib/fullcalendar/fullcalendar.min.css') }}"> -->
<link rel="stylesheet" href="{{ URL::asset('template/css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">Crea tu notificación</h5>

<div class = "col-xl-6">

  <section class="box-typical steps-icon-block">
    <div class="steps-icon-progress">
      <ul>
        <li class="active">
          <div class="icon">
            <i class="font-icon font-icon-edit"></i>
          </div>
          <div class="caption">Contenido</div>
        </li>
        <li class="active">
          <div class="icon">
            <i class="font-icon font-icon-user"></i>
          </div>
          <div class="caption">Destinatarios</div>
        </li>
        <li class="active">
          <div class="icon">
            <i class="font-icon font-icon-calend"></i>
          </div>
          <div class="caption">Calendarizar</div>
        </li>
        <li>
          <div class="icon">
            <i class="font-icon font-icon-check-bird"></i>
          </div>
          <div class="caption">Confirmación</div>
        </li>
      </ul>
    </div>

    <div id = "not-step1">
      <header class="steps-numeric-title">Programa la hora y fecha</header>
      @if($errors->any())
        <span style="color: red;">Error:</span>
        <ul>
          @foreach($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      {{Form::model($maker)}}

      <section class="card">
        <div class="card-block">
          <div class="row">
            <div class="col-xs-8 col-sm-6">
              <label class="form-label" for="daterange3">Fecha</label>
              <div class="form-group">
                <div class='input-group date'>
                  <?php
                    $time = \Carbon\Carbon::parse($maker->send_date.' '.$maker->send_time);
                    $time->setTimezone('America/Mexico_City');
                  ?>
                  {{Form::text('date', $time->format("d/m/Y"), ['id'=>'daterange3','class' => 'form-control', 'placeholder' => '01/01/1990'])}}
                  <span class="input-group-addon">
                    <i class="font-icon font-icon-calend"></i>
                  </span>
                </div>
              </div>
            </div><!--.col-->
          </div>
          <div class="row">
            <div class="col-xs-8 col-sm-6">
              <label class="form-label" for="clockselector">Hora</label>
              <div class="form-group">
                <div class="input-group clockpicker" data-autoclose="true">

                  {{Form::text('time', $time->format("H:i"), ['id'=>'clockselector','class' => 'form-control', 'placeholder' => 'hora'])}}
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>

        </div>
			</section>
    <!-- <button type="button" class="btn btn-rounded btn-grey float-left">← Back</button> -->
    <a href="2"><button type="button" class="btn btn-rounded btn-grey float-left">← Atrás</button></a>
    <!-- <a href="4"><button type="button" class="btn btn-rounded float-right">Confirmar →</button></a> -->
    <button type="submit" class="btn btn-rounded float-right">Siguiente →</button>
    {{Form::close()}}
  </div>

</section><!--.steps-icon-block-->

</div>

@stop

@section('scripts')
  <script src="{{ URL::asset('template/js/lib/clockpicker/bootstrap-clockpicker.min.js') }}"></script>
	<script src="{{ URL::asset('template/js/lib/clockpicker/bootstrap-clockpicker-init.js') }}"></script>
	<script src="{{ URL::asset('template/js/lib/daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ URL::asset('template/js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
	<script>
		$(function() {
			$('#daterange3').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true
			});

		});
	</script>
@stop
