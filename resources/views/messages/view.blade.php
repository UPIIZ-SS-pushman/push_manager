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

<div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <section class="box-typical">
        <div id = "not-step1">
            <header class="widget-header-dark">
                Leer mensaje
            </header>
            
            <div style="padding:10px;">

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
                
                {{Form::model($message)}}

                    <?php
                    $time = \Carbon\Carbon::parse($message->created_at);
                    $time->setTimezone('America/Mexico_City');
                    $remitent = $message->user->name.' '.$message->user->lastname;
                    ?>

                    <div class="container-fluid">
                        <label class="form-control-label">Remitente</label>
                        {{Form::text('remitent', $remitent, ['class' => 'form-control', 'placeholder' => 'Remitente', 'readonly'])}}
                    </div>

                    <div class="container-fluid">
                        <label class="form-control-label">Contenido</label>
                        {{Form::textarea('body', $message->body_message, ['rows'=>10, 'class'=>'form-control', 'placeholder'=>'Contenido', 'readonly'])}}
                    </div>

                    <h5 class="m-t-lg with-border"></h5>

                    <div class="row">
                        <div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-1">
                        <div class="form-group">
                            <div class="input-group">
                            <label class="form-control-label">Fecha de envío</label>
                                {{Form::text('created_at', $time->format("d/m/Y"), ['id'=>'daterange3', 'class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', 'readonly'])}}
                            </div>
                        </div>
                        </div>

                        <div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0 col-lg-4 col-lg-offset-2">
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
                    
                    </br>
                    </br>

                    <div class="row">
                        <fieldset class="form-group">
                            <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                                <a href="{{url('/viewMessages')}}"><button type="button" class="btn btn-rounded btn-grey btn-inline btn-lg btn-block">Volver</button></a>
                            </div>
                        </fieldset>
                    </div>

                {{Form::close()}}
            </div>

        </div>
    </section>
</div>
<!--
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
  </section>
</div>-->
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
