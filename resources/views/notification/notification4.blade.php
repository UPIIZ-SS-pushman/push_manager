@extends('layout')
@section('title')
PushManager - Crear notificación (4/4)
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
        <li class="active">
          <div class="icon">
            <i class="font-icon font-icon-check-bird"></i>
          </div>
          <div class="caption">Confirmación</div>
        </li>
      </ul>
    </div>

    <div id = "not-step1">
      <header class="steps-numeric-title">Confirma tu notificación</header>
      @if($errors->any())
      <span style="color: red;">Error:</span>
      <ul>
        @foreach($errors->all() as $error)
        <li style="color: red;">{{ $error }}</li>
        @endforeach
      </ul>
      @endif

      {{Form::model($maker)}}
      <?php
      $time = \Carbon\Carbon::parse($maker->send_date.' '.$maker->send_time);
      $time->setTimezone('America/Mexico_City');
      $individuals = $maker->getSelectedIndividuals();
      $sectors = $maker->getSelectedSectors();
      $users = App\User::all();
      $userslist = array();
      foreach($users as $u){
        $userslist[$u->id] = $u->name.' '.$u->lastname;
      }
      ?>

      <div class="form-group">
        <label class="form-control-label">Título</label>
        {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly'])}}
      </div>

      <div class="form-group">
        <label class="form-control-label">Contenido</label>
        {{Form::textarea('body', null, ['rows'=>4, 'class'=>'form-control', 'placeholder'=>'Contenido', 'readonly'])}}
      </div>

      <div class="form-group">
        <label class="form-control-label">Destinatarios (individuos)</label>
        {{Form::select('individuos[]',
        $userslist,
        $individuals,
        ['multiple'=>true, 'class'=>'select2', 'disabled'])}}
      </div>
      <div class="form-group">
        <label class="form-control-label">Destinatarios (grupos)</label>
        {{Form::select('grupos[]',
        App\Sector::lists('name', 'id'),
        $sectors,
        ['multiple'=>true, 'class'=>'select2', 'disabled'])}}
      </div>

      <h5 class="m-t-lg with-border"></h5>

      <div class="row">
        <div class="col-md-6 col-sm-6">
          <div class="form-group">
            <div class="input-group">
              <label class="form-control-label">Fecha de envío</label>
              {{Form::text('send_date', $time->format("d/m/Y"), ['class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', 'readonly'])}}
            </div>
          </div>
        </div>

        <div class="col-md-6 col-sm-6">
          <div class="form-group">
            <div class="input-group">
              <label class="form-control-label">Hora de envío</label>
              {{Form::text('send_time', $time->format("H:i"), ['class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', 'readonly'])}}
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <a href="3"><button type="button" class="btn btn-rounded btn-grey float-left">← Atrás</button></a>
        <button type="submit" class="btn btn-rounded btn-success float-right">Confirmar <i class="font-icon font-icon-check-bird"></i></button>
      </div>
      {{Form::close()}}
    </div>
  </section><!--.steps-icon-block-->
</div>


@stop

@section('scripts')
<script src="{{ URL::asset('template/js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/select2/select2.full.min.js') }}"></script>
@stop
