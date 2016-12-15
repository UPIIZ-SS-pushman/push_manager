@extends('layout')

@section('style')
<link rel="stylesheet" href="{{ URL::asset('template/css/lib/fullcalendar/fullcalendar.min.css') }}">
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


<div id = "not-step2">
    <header class="steps-numeric-title">Selecciona tus destinatarios</header>

    <div class="form-group">
    <label class="form-control-label">Individual</label>
		<!--<div class="col-md-6">-->
			<select class="select2" multiple="multiple" id="select-individual">
        @foreach(App\User::all() as $user)
          <option>{{$user->surname}} {{$user->lastname}}</option>
        @endforeach
			</select>
			<br/>
			<br/>
		<!--</div>-->

    </div>

    <div class="form-group">
    <label class="form-control-label">Grupos</label>
      <!--<div class="col-md-6">-->
			<select class="select2" multiple="multiple" id="select-groups">
				@foreach(App\Sector::all() as $sector)
          <option>{{$sector->name}}</option>
        @endforeach
			</select>
			<br/>
			<br/>
		<!--</div>-->
    </div>

    <a href="1"><button type="button" class="btn btn-rounded btn-grey float-left">← Atrás</button></a>
    <a href="3"><button type="button" class="btn btn-rounded float-right">Siguiente →</button></a>
  </div>

</section><!--.steps-icon-block-->

</div>

@stop

@section('scripts')
<script src="{{ URL::asset('template/js/lib/jquery-tag-editor/jquery.caret.min.js') }}"></script>
	<script src="{{ URL::asset('template/js/lib/jquery-tag-editor/jquery.tag-editor.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/select2/select2.full.min.js') }}"></script>

@stop