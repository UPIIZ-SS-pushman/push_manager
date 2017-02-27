@extends('layout')
@section('title')
PushManager - Crear notificación (1/4)
@stop
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

    <div id = "not-step1">
      <header class="steps-numeric-title">Escribe tu notificación</header>
      @if($errors->any())
        <span style="color: red;">Error:</span>
        <ul>
          @foreach($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
          @endforeach
        </ul>
      @endif
      {{Form::model($maker)}}
        <div class="form-group">
          <label class="form-control-label">Título</label>
          {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título'])}}
        </div>

        <div class="form-group">
          <label class="form-control-label">Contenido</label>
          {{Form::textarea('body', null, ['rows'=>4, 'class'=>'form-control', 'placeholder'=>'Contenido'])}}
        </div>

        <button type="submit" class="btn btn-rounded float-right">Siguiente →</button>
      {{Form::close()}}
    </div>

  </section><!--.steps-icon-block-->

</div>

@stop

@section('scripts')

@stop
