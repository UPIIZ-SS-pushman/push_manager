@extends('layouts.main')

@section('title')
PushManager - Página principal
@stop
@section('style')
<link rel="stylesheet" href="template/css/lib/bootstrap-sweetalert/sweetalert.css"/>
<link href="template/css/popup.css" rel="stylesheet">
@stop
@section('content')
<div class="row">
    <div class="col-xl-8 dahsboard-column">
        <section class="box-typical box-typical-dashboard panel panel-default">
            <header class="box-typical-header panel-heading">
                <h3 class="panel-title">Anuncios</h3>
            </header>
            <div class="box-typical-body panel-body">
                @include('components.imageSlideshow')
            </div><!--.box-typical-body-->
        </section>
    </div><!--.col-->
</div><!--.row-->

<div class="row">
  <div class="col-xl-6">
        <div class="row">
            <div class="col-sm-6">
                <article class="statistic-box red">
                    <div>
                        <div class="number">{{\App\User::count()}}</div>
                        <div class="caption"><div>Usuarios registrados</div></div>
                    </div>
                </article>
            </div><!--.col-->
            <div class="col-sm-6">
                <article class="statistic-box purple">
                    <div>
                        <div class="number">{{\App\Notification::count()}}</div>
                        <div class="caption"><div>Notificaciones programadas</div></div>
                    </div>
                </article>
            </div><!--.col-->
            @if(Auth::user()->user_type_id ==1)
            <div class="col-sm-6">
                <article class="statistic-box yellow">
                    <div>
                        <div class="number">{{\App\AdminMessage::count()}}</div>
                        <div class="caption"><div>Mensajes al administrador</div></div>
                    </div>
                </article>
            </div><!--.col-->
            @endif

        </div><!--.row-->
    </div><!--.col-->
  <div class="col-xl-6 dahsboard-column">
      <section class="box-typical box-typical-dashboard panel panel-default">
          <header class="box-typical-header panel-heading">
              <h3 class="panel-title">Notificación rápida</h3>
          </header>
          <div class="box-typical-body panel-body">
            <div id = "not-step1" style="padding-left:20px;padding-right:20px;">
            @if($errors->any())
              <span style="color: red;">Error:</span>
              <ul>
                @foreach($errors->all() as $error)
                  <li style="color: red;">{{ $error }}</li>
                @endforeach
              </ul>
            @endif
            {{Form::open(array('url'=>'/quickNotification', 'id'=>'quickNotifForm'))}}

              <div class="form-group">
                <label class="form-control-label">Título</label>
                {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título', 'id'=>'title'])}}
              </div>

              <div class="form-group">
                <label class="form-control-label">Contenido</label>
                {{Form::textarea('body', null, ['rows'=>2, 'class'=>'form-control', 'placeholder'=>'Contenido', 'id'=>'body'])}}
              </div>

              <button id="submitNotif" type="button" class="btn btn-rounded float-right">Enviar</button>
            {{Form::close()}}
          </div>

          </div><!--.box-typical-body-->
      </section>
  </div><!--.col-->
</div><!--.row-->

<div class="row">
    <div class="col-xl-8 dahsboard-column">
        <section class="box-typical box-typical-dashboard panel panel-default">
            <header class="box-typical-header panel-heading">
                <h3 class="panel-title">Edición de anuncios</h3>
            </header>
            <div class="box-typical-body panel-body">
              <div style="padding:20px;">
                @include('components.imageSlideshowUpload')
              </div>
            </div><!--.box-typical-body-->
        </section>
    </div><!--.col-->
</div><!--.row-->

@stop

@section('scripts')
<script src="{{ URL::asset('template/js/lib/jqueryui/jquery-ui.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/lobipanel/lobipanel.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/bootstrap-sweetalert/sweetalert.min.js') }}"></script>
<script>
	$(document).ready(function() {
		$('.panel').lobiPanel({
			sortable: true
		});

		$('.panel').on('dragged.lobiPanel', function(ev, lobiPanel){
			$('.dahsboard-column').matchHeight();
		});
	});
</script>

<script>
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
</script>
<script>
$('#submitNotif').click(function(){
  checkQuickNotif();
});
</script>

<script src="{{ URL::asset('template/js/popups/quickNotificationPopup.js') }}"></script>
@stop
