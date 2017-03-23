@extends('layouts.main')
@section('title')
PushManager - Crear notificación (1/4)
@stop
@section('style')
<link rel="stylesheet" src="{{ URL::asset('template/css/lib/fullcalendar/fullcalendar.min.css') }}">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">Crea tu notificación</h5>

<div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <section class="box-typical">
        <header class="widget-header-dark">Escribe tu notificación</header>
        <div class="steps-icon-progress" style="padding:10px 35px;">
            <ul>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-edit"></i>
                    </div>
                    <div class="caption hidden-sm-up">1</div>
                    <div class="caption hidden-sm-down">Contenido</div>
                </li>
                <li>
                    <div class="icon">
                        <i class="font-icon font-icon-user"></i>
                    </div>
                    <div class="caption hidden-sm-up">2</div>
                    <div class="caption hidden-sm-down">Destinatarios</div>
                </li>
                <li>
                    <div class="icon">
                        <i class="font-icon font-icon-calend"></i>
                    </div>
                    <div class="caption hidden-sm-up">3</div>
                    <div class="caption hidden-sm-down">Calendarizar</div>
                </li>
                <li>
                    <div class="icon">
                        <i class="font-icon font-icon-check-bird"></i>
                    </div>
                    <div class="caption hidden-sm-up">4</div>
                    <div class="caption hidden-sm-down">Confirmación</div>
                </li>
            </ul>
        </div>

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

            {{Form::model($maker)}}

                <div class="container-fluid">
                    <label class="form-control-label">Título</label>
                    {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título'])}}
                </div>

                <div class="container-fluid">
                    <label class="form-control-label">Contenido</label>
                    {{Form::textarea('body', null, ['rows'=>4, 'class'=>'form-control', 'placeholder'=>'Contenido'])}}
                </div>

                </br>
                </br>

                <div class="row">
                    <fieldset class="form-group">
                        <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 col-lg-4 col-lg-offset-4">
                            <button type="submit" class="btn btn-rounded float-right btn-lg btn-block">Siguiente →</button>
                        </div>
                    </fieldset>
                </div>
            {{Form::close()}}
        </div>
    </section>
</div>

@stop

@section('scripts')

@stop
