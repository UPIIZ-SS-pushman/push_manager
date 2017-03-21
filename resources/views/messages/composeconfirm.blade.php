@extends('layouts.main')
@section('title')
PushManager - Mensajear al administrador
@stop
@section('style')
<!-- <link rel="stylesheet" src="{{ URL::asset('template/css/lib/fullcalendar/fullcalendar.min.css') }}"> -->
<link rel="stylesheet" href="{{ URL::asset('template/css/lib/clockpicker/bootstrap-clockpicker.min.css') }}">
@stop

@section('content')
<h5 class="m-t-lg with-border m-t-0">
  Mensajear al administrador
</h5>

<div class = "col-xl-6">
  <section class="box-typical steps-icon-block">
    <div id = "not-step1">
      <header class="steps-numeric-title">Se ha enviado tu mensaje</header>
      @if($errors->any())
        <span style="color: red;">Error:</span>
        <ul>
          @foreach($errors->all() as $error)
            <li style="color: red;">{{ $error }}</li>
          @endforeach
        </ul>
      @endif
        <a href="/"><button type="button" class="btn btn-rounded btn-grey float-left">Salir</button></a>
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
@stop
