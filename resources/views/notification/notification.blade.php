@extends('layout')

@section('style')
<link rel="stylesheet" src="{{ URL::asset('template/css/lib/fullcalendar/fullcalendar.min.css') }}">
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
      <li>
        <div class="icon">
          <i class="font-icon font-icon-user"></i>
        </div>
        <div class="caption">Destinatarios</div>
      </li>
      <li>
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



  <!-- <header class="steps-numeric-title">Customer information</header>
  <div class="form-group">
    <input type="text" class="form-control" placeholder="E-Mail"/>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" placeholder="Password"/>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" placeholder="Repeat password"/>
  </div>
  <button type="button" class="btn btn-rounded btn-grey float-left">← Back</button>
  <button type="button" class="btn btn-rounded float-right">Next →</button> -->

  <div id = "not-step1">
    <header class="steps-numeric-title">Escribe tu notificación</header>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <div class="form-group">
      <label class="form-control-label">Titulo</label>
      <input type="text" class="form-control" placeholder="Titulo"/>
    </div>

    <div class="form-group">
      <label class="form-control-label">Contenido</label>
      <textarea rows="4" class="form-control" placeholder="Textarea"></textarea>
    </div>

    <!-- <button type="button" class="btn btn-rounded btn-grey float-left">← Back</button> -->
    <a href="2"><button type="button" class="btn btn-rounded float-right">Siguiente →</button></a>
  </div>

</section><!--.steps-icon-block-->

</div>

@stop

@section('scripts')

@stop
