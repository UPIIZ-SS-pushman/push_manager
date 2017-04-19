@extends('layouts.main')
@section('title')
PushManager - Crear notificación (3/4)
@stop
@section('style')
<!-- <link rel="stylesheet" href="{{ URL::asset('template/css/lib/fullcalendar/fullcalendar.min.css') }}"> -->
<link rel="stylesheet" href="{{ URL::asset('template/css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">Crea tu notificación</h5>

<div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <section class="box-typical">
        <header class="widget-header-dark">Selecciona tus destinatarios</header>
        <div class="steps-icon-progress" style="padding:10px 35px;">
            <ul>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-edit"></i>
                    </div>
                    <div class="caption hidden-sm-up">1</div>
                    <div class="caption hidden-sm-down">Contenido</div>
                </li>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-user"></i>
                    </div>
                    <div class="caption hidden-sm-up">2</div>
                    <div class="caption hidden-sm-down">Destinatarios</div>
                </li>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-calend"></i>
                    </div>
                    <div class="caption hidden-sm-up">3</div>
                    <div class="caption hidden-sm-down">Calendarizar</div>
                </li>
                <li>
                    <div class="icon">
                        <i class="font-icon font-icon-check-bird"></i>
                    </div>
                    <div class="caption hidden-sm-up">4</div>
                    <div class="caption hidden-sm-down">Confirmación</div>
                </li>
            </ul>
        </div>

        <div id = "not-step1" style="padding:10px;">
            @if($errors->any())
                <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{Form::model($maker)}}

                <div class="row">
                    <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
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
                    <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
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

                </br>
                </br>

                <div class="row">
                    <fieldset class="form-group">
                        <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-0 col-lg-4 col-lg-offset-1">
                            <a href="2"><button type="button" class="btn btn-rounded btn-grey btn-inline btn-lg btn-block">← Atrás</button></a>
                        </div>
                        <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-0 col-lg-4 col-lg-offset-2">
                            <button type="submit" class="btn btn-rounded btn-inline btn-lg btn-block">Siguiente →</button>
                        </div>
                    </fieldset>
                </div>
            {{Form::close()}}
        </div>
    </section>
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
