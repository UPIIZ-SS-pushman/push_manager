@extends('layout')

@section('style')
<!-- <link rel="stylesheet" href="template/css/lib/fullcalendar/fullcalendar.min.css"> -->
<link rel="stylesheet" href="template/css/lib/clockpicker/bootstrap-clockpicker.min.css">
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
      <header class="steps-numeric-title">Programando notificación</header>

      <section class="card">
        <div class="card-block">
          <div class="row">
            <div class="col-xs-8 col-sm-6">
              <label class="form-label" for="daterange3">Fecha</label>
              <div class="form-group">
                <div class='input-group date'>
                  <input id="daterange3" type="text" value="" class="form-control">
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
                  <input id="clockselector" type="text" class="form-control" value="">
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
    <a href="n2"><button type="button" class="btn btn-rounded btn-grey float-left">← Atrás</button></a>
    <a href="n4"><button type="button" class="btn btn-rounded float-right">Confirmar →</button></a>
  </div>

</section><!--.steps-icon-block-->

</div>

@stop

@section('scripts')
<script src="template/js/lib/clockpicker/bootstrap-clockpicker.min.js"></script>
	<script src="template/js/lib/clockpicker/bootstrap-clockpicker-init.js"></script>
	<script src="template/js/lib/daterangepicker/daterangepicker.js"></script>
	<script src="template/js/lib/bootstrap-select/bootstrap-select.min.js"></script>
	<script>

		$(function() {
			$('#daterange3').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true
			});

		});

	</script>
@stop
