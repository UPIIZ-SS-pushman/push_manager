@extends('layout')

@section('style')
<link rel="stylesheet" href="template/css/lib/fullcalendar/fullcalendar.min.css">
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

        <div class="form-group">
    			<label class="form-label" for="date-and-time-mask-input">Fecha y hora</label>
    			<input type="text" class="form-control" id="date-and-time-mask-input">
    		</div>

        <div class="form-group">
    			<div class="input-group">
    								<input type="text" class="form-control" aria-label="Text input with dropdown button">
    								<div class="input-group-btn">
    									<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    										Action
    									</button>
    									<div class="dropdown-menu dropdown-menu-right">
    										<a class="dropdown-item" href="#">Action</a>
    										<a class="dropdown-item" href="#">Another action</a>
    										<a class="dropdown-item" href="#">Something else here</a>
    										<div role="separator" class="dropdown-divider"></div>
    										<a class="dropdown-item" href="#">Separated link</a>
    									</div>
    								</div>
    							</div>
    		</div>
      </div>


    <!-- <button type="button" class="btn btn-rounded btn-grey float-left">← Back</button> -->
    <button type="button" class="btn btn-rounded float-right">Next →</button>
  </div>

</section><!--.steps-icon-block-->

</div>

@stop

@section('scripts')
<script src="template/js/lib/input-mask/jquery.mask.min.js"></script>
<script src="template/js/lib/input-mask/input-mask-init.js"></script>
@stop
