@extends('layouts.main')
@section('title')
PushManager - Leer mensaje
@stop
@section('style')
<!-- <link rel="stylesheet" src="{{ URL::asset('template/css/lib/fullcalendar/fullcalendar.min.css') }}"> -->
<link rel="stylesheet" href="{{ URL::asset('template/css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">
  Leer mensaje para el administrador
</h5>

<div class = "col-xl-6">
  <section class="box-typical steps-icon-block">
    <div id = "not-step1">
      <header class="steps-numeric-title">
        Leer mensaje
      </header>

      @if($errors->any())
      <span style="color: red;">Error:</span>
      <ul>
        @foreach($errors->all() as $error)
        <li style="color: red;">{{ $error }}</li>
        @endforeach
      </ul>
      @endif

      {{Form::model($message)}}

      <?php
      $time = \Carbon\Carbon::parse($message->created_at);
      $time->setTimezone('America/Mexico_City');
      $remitent = $message->user->name.' '.$message->user->lastname;
      ?>

      <div class="form-group">
        <label class="form-control-label">Remitente</label>
        {{Form::text('remitent', $remitent, ['class' => 'form-control', 'placeholder' => 'Remitente', 'readonly'])}}
      </div>

      <div class="form-group">
        <label class="form-control-label">Contenido</label>
        {{Form::textarea('body', $message->body_message, ['rows'=>10, 'class'=>'form-control', 'placeholder'=>'Contenido', 'readonly'])}}
      </div>

      <h5 class="m-t-lg with-border"></h5>

      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="form-group">
            <div class="input-group">
              <label class="form-control-label">Fecha de envío</label>
                {{Form::text('created_at', $time->format("d/m/Y"), ['id'=>'daterange3', 'class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', 'readonly'])}}
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6">
          <div class="form-group">
            <div class="input-group">
              <label class="form-control-label">Hora de envío</label>
              <div class="input-group clockpicker" data-autoclose="true">
                {{Form::text('send_time', $time->format("H:i"), ['id'=>'clockselector', 'class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', 'readonly'])}}
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <a href="{{url('/viewMessages')}}"><button type="button" class="btn btn-rounded btn-grey float-left">Volver</button></a>
      </div>
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
<script src="{{ URL::asset('template/js/lib/select2/select2.full.min.js') }}"></script>


<script>
  $(function() {
    $('#daterange3').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true
    });

  });
</script>
@stop
