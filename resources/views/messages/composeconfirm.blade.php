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

<div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <section class="box-typical">
        <header class="widget-header-dark">Finalizar</header>

        <div id = "not-step1" style="padding:10px;">
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

            <h5 class="m-t-lg with-border m-t-0">Se ha enviado tu mensaje</h5>
            </br>
            </br>

            <div class="row">
                <fieldset class="form-group">
                    <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                        <a href="{{url('/')}}"><button type="button" class="btn btn-rounded btn-grey btn-inline btn-lg btn-block">Salir</button></a>
                    </div>
                </fieldset>
            </div>
        </div>
    </section>
</div>

<!--<div class = "col-xl-6">
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
        <a href="{{url('/')}}"><button type="button" class="btn btn-rounded btn-grey float-left">Salir</button></a>
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
@stop
