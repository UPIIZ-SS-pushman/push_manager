@extends('layouts.main')
@section('title')
PushManager - Editar notificación
@stop
@section('style')
<!-- <link rel="stylesheet" src="{{ URL::asset('template/css/lib/fullcalendar/fullcalendar.min.css') }}"> -->
<link rel="stylesheet" href="{{ URL::asset('template/css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">
  @if($editable=='')
    Editar notificación
  @else
    Ver notificación
  @endif

</h5>

<div class = "col-xl-6">
  <section class="box-typical steps-icon-block">
    <div id = "not-step1">
      <header class="steps-numeric-title">
        @if($editable=='')
          Editar notificación
        @else
          Ver notificación
        @endif
      </header>

      @if($notification->notification_log->status == 1)
        <button type="button" class="btn btn-success">Enviada</button>
      @elseif($notification->notification_log->status == -1)
        <button type="button" class="btn btn-danger">No enviada</button>
      @elseif($notification->notification_log->status == 0)
        <button type="button" class="btn btn-info">Programada</button>
      @endif

      @if($errors->any())
      <span style="color: red;">Error:</span>
      <ul>
        @foreach($errors->all() as $error)
        <li style="color: red;">{{ $error }}</li>
        @endforeach
      </ul>
      @endif

      @if($editable=='')
        {{Form::model($notification,['url'=>'/notification/update/'.$notification->id])}}
      @else
        {{Form::model($notification)}}
      @endif

      <?php
      $time = \Carbon\Carbon::parse($notification->sent);
      $time->setTimezone('America/Mexico_City');
      $individuals = $notification->getSelectedIndividuals();
      $sectors = $notification->getSelectedSectors();
      $users = App\User::all();
      $userslist = array();
      foreach($users as $u){
        $userslist[$u->id] = $u->name.' '.$u->lastname;
      }
      ?>

      <div class="form-group">
        <label class="form-control-label">Título</label>
        {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título', $editable])}}
      </div>

      <div class="form-group">
        <label class="form-control-label">Contenido</label>
        {{Form::textarea('body', null, ['rows'=>4, 'class'=>'form-control', 'placeholder'=>'Contenido', $editable])}}
      </div>

      <div class="form-group">
        <label class="form-control-label">Generada por</label>
        {{Form::text('remitent', $notification->notification_log->user->name.' '.$notification->notification_log->user->lastname, ['class' => 'form-control', 'placeholder' => 'Remitente', 'readonly'])}}
      </div>

      <div class="form-group">
        <label class="form-control-label">Destinatarios (individuos)</label>
        {{Form::select('individuos[]',
        $userslist,
        $individuals,
        ['multiple'=>true, 'class'=>'select2', $enabled])}}
      </div>
      <div class="form-group">
        <label class="form-control-label">Destinatarios (grupos)</label>
        {{Form::select('grupos[]',
        App\Sector::lists('name', 'id'),
        $sectors,
        ['multiple'=>true, 'class'=>'select2', $enabled])}}
      </div>

      <h5 class="m-t-lg with-border"></h5>

      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="form-group">
            <div class="input-group">
              <label class="form-control-label">Fecha de envío</label>
              @if($editable=='')
                {{Form::text('send_date', $time->format("d/m/Y"), ['id'=>'daterange3', 'class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00'])}}
              @else
                {{Form::text('send_date', $time->format("d/m/Y"), ['id'=>'daterange3', 'class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', $editable, $enabled])}}
              @endif

            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6">
          <div class="form-group">
            <div class="input-group">
              <label class="form-control-label">Hora de envío</label>
              <div class="input-group clockpicker" data-autoclose="true">
              @if($editable=='')
                {{Form::text('send_time', $time->format("H:i"), ['id'=>'clockselector', 'class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00'])}}
              @else
                {{Form::text('send_time', $time->format("H:i"), ['id'=>'clockselector', 'class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', $editable, $enabled])}}
              @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <a href="/calendar"><button type="button" class="btn btn-rounded btn-grey float-left">Cancelar</button></a>
        @if($time->gt(\Carbon\Carbon::now('UTC')->addMinutes(2)))
        <button type="submit" class="btn btn-rounded btn-success float-right">
          @if($editable=='')
            Guardar
          @else
            Editar
          @endif
        <i class="font-icon font-icon-check-bird"></i></button>


        @endif
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
