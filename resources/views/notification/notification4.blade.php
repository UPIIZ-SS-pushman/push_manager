@extends('layouts.main')
@section('title')
PushManager - Crear notificación (4/4)
@stop
@section('style')
<link rel="stylesheet" src="{{ URL::asset('template/css/lib/fullcalendar/fullcalendar.min.css') }}">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">Crea tu notificación</h5>

<div class="col-xs-12 col-xs-offset-0 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
    <section class="box-typical">
        <header class="widget-header-dark">Confirma tu notificación</header>
        <div class="steps-icon-progress" style="padding:10px 35px;">
            <ul>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-edit"></i>
                    </div>
                    <div class="caption hidden-sm-up">1</div>
                    <div class="caption hidden-sm-down">Contenido</div>
                </li>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-user"></i>
                    </div>
                    <div class="caption hidden-sm-up">2</div>
                    <div class="caption hidden-sm-down">Destinatarios</div>
                </li>
                <li class="active">
                    <div class="icon">
                        <i class="font-icon font-icon-calend"></i>
                    </div>
                    <div class="caption hidden-sm-up">3</div>
                    <div class="caption hidden-sm-down">Calendarizar</div>
                </li>
                <li class="active">
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

                <div class="container-fluid">
                    <label class="form-control-label">Título</label>
                    {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Título', 'readonly'])}}
                </div>

                <div class="container-fluid">
                     <label class="form-control-label">Contenido</label>
                    {{Form::textarea('body', null, ['rows'=>4, 'class'=>'form-control', 'placeholder'=>'Contenido', 'readonly'])}}
                </div>

                <div class="container-fluid">
                     <label class="form-control-label">Destinatarios (individuos)</label>
                    {{Form::select('individuos[]',
                        $userslist,
                        $individuals,
                        ['multiple'=>true, 'class'=>'select2', 'disabled'])}}
                </div>

                <div class="container-fluid">
                    <label class="form-control-label">Destinatarios (grupos)</label>
                    {{Form::select('grupos[]',
                        App\Sector::lists('name', 'id'),
                        $sectors,
                        ['multiple'=>true, 'class'=>'select2', 'disabled'])}}
                </div>

                <h5 class="m-t-lg with-border"></h5>

                <div class="row" style="padding:15px;">
                    <fieldset class="form-group">
                        <div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-1 col-lg-4 col-lg-offset-1">
                            <div class="input-group">
                                <label class="form-control-label">Fecha de envío</label>
                            {{Form::text('send_date', $time->format("d/m/Y"), ['class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', 'readonly'])}}
                            </div>
                        </div>
                        <div class="col-xs-10 col-xs-offset-1 col-md-5 col-md-offset-0 col-lg-4 col-lg-offset-2">
                            <div class="input-group">
                                <label class="form-control-label">Hora de envío</label>
                                {{Form::text('send_time', $time->format("H:i"), ['class' => 'form-control maxlength-simple', 'placeholder' => '00:00:00', 'readonly'])}}
                            </div>
                        </div>
                    </fieldset>
                </div>

                </br>
                </br>

                <div class="row">
                    <fieldset class="form-group">
                        <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-0 col-lg-4 col-lg-offset-1">
                            <a href="3"><button type="button" class="btn btn-rounded btn-grey btn-inline btn-lg btn-block">← Atrás</button></a>
                        </div>
                        <div class="col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-0 col-lg-4 col-lg-offset-2">
                            <button type="submit" class="btn btn-rounded btn-success btn-inline btn-lg btn-block">Confirmar</button>
                        </div>
                    </fieldset>
                </div>
            {{Form::close()}}
        </div>
    </section>
</div>
@stop

@section('scripts')
<script src="{{ URL::asset('template/js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/select2/select2.full.min.js') }}"></script>
@stop
