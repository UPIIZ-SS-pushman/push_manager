@extends('layouts.main')
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('title')
PushManager - Editar notificación
@stop
@section('style')
<link rel="stylesheet" href="{{ URL::asset('template/css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('template/css/lib/bootstrap-sweetalert/sweetalert.css') }}"/>
<link href="{{ URL::asset('template/css/popup.css') }}" rel="stylesheet">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">
  @if($editable=='')
    Editar notificación
  @else
    Ver notificación
  @endif

</h5>

<div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <section class="box-typical">
        <div id = "not-step1">
            <header class="widget-header-dark">
            @if($editable=='')
                Editar notificación
            @else
                Ver notificación
            @endif
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

                @if($notification->notification_log->status == 1)
                    <div class="alert alert-success alert-fill alert-close alert-dismissible fade in" role="alert">
                        <ul>
                            Enviada
                        </ul>
                    </div>
                @elseif($notification->notification_log->status == -1)
                    <div class="alert alert-warning alert-fill alert-close alert-dismissible fade in" role="alert">
                        <ul>
                            No enviada
                        </ul>
                    </div>
                @elseif($notification->notification_log->status == 0)
                    <div class="alert alert-purple alert-fill alert-close alert-dismissible fade in" role="alert">
                        <ul>
                            Programada
                        </ul>
                    </div>
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

                <div class="container-fluid">
                    <label class="form-control-label">Título</label>
                    {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título', $editable])}}
                </div>

                <div class="container-fluid">
                    <label class="form-control-label">Contenido</label>
                    {{Form::textarea('body', null, ['rows'=>4, 'class'=>'form-control', 'placeholder'=>'Contenido', $editable])}}
                </div>

                <div class="container-fluid">
                    <label class="form-control-label">Destinatarios (individuos)</label>
                    {{Form::select('individuos[]',
                    $userslist,
                    $individuals,
                    ['multiple'=>true, 'class'=>'select2', $enabled])}}
                </div>

                <div class="container-fluid">
                    <label class="form-control-label">Destinatarios (grupos)</label>
                    {{Form::select('grupos[]',
                    App\Sector::lists('name', 'id'),
                    $sectors,
                    ['multiple'=>true, 'class'=>'select2', $enabled])}}
                </div>

                <h5 class="m-t-lg with-border"></h5>

                <div class="row" style="padding:15px;">
                        <fieldset class="form-group">
                            <div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-1">
                                <div class="input-group">
                                    <label class="form-control-label">Fecha</label>
                                @if($editable=='')
                                    {{Form::text('send_date', $time->format("d/m/Y"), ['id'=>'daterange3', 'class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00'])}}
                                @else
                                    {{Form::text('send_date', $time->format("d/m/Y"), ['id'=>'daterange3', 'class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', $editable, $enabled])}}
                                @endif
                                </div>
                            </div>
                            <div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0 col-lg-4 col-lg-offset-2">
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
                        </fieldset>
                    </div>

                <div class="row">
                    <fieldset class="form-group">
                            @if($time->gt(\Carbon\Carbon::now('UTC')->addMinutes(2)))
                                <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-0 col-lg-4 col-lg-offset-1">
                                    <a href="{{url('/calendar')}}"><button type="button" class="btn btn-rounded btn-grey btn-inline btn-lg btn-block">Cancelar</button></a>
                                </div>
                                <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-0 col-lg-4 col-lg-offset-2">
                                    @if($editable=='')
                                        <button type="submit" class="btn btn-rounded btn-success btn-inline btn-lg btn-block">Guardar<i class="font-icon font-icon-check-bird"></i></button>
                                    @else
                                        <button type="submit" class="btn btn-rounded btn-warning btn-inline btn-lg btn-block">Editar</button>
                                    @endif
                                </div>
                            @else
                                <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-1">
                                    <a href="{{url('/calendar')}}"><button type="button" class="btn btn-rounded btn-grey btn-inline btn-lg btn-block">Cancelar</button></a>
                                </div>
                                <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-2">
                                    <button id="btndeletenotif" type="button" class="btn btn-rounded btn-warning btn-inline btn-lg btn-block">Eliminar</button>
                                </div>
                            @endif
                        </div>
                    </fieldset>
                </div>

                {{Form::close()}}
            </div>

        </div>
    </section>
</div>

@stop

@section('scripts')
<script src="{{ URL::asset('template/js/lib/clockpicker/bootstrap-clockpicker.min.js') }}"></script>

<script src="{{ URL::asset('template/js/lib/clockpicker/bootstrap-clockpicker-init.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/select2/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/bootstrap-sweetalert/sweetalert.min.js') }}"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
var postRoute = "{{url('/notification/delete')}}";
var calendRoute = "{{url('/calendar')}}";
</script>

<script>
  $(function() {
    $('#daterange3').daterangepicker({
      singleDatePicker: true,
      showDropdowns: true
    });

  });

</script>
<script src="{{ URL::asset('template/js/popups/viewNotificationPopup.js') }}"></script>
<script>
  $('#btndeletenotif').click(function(){
    deleteNotification({{$notification->id}});
  });

</script>
@stop
