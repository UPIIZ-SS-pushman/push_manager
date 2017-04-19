@extends('layouts.app')
@section('title')
PushManager - Recuperar contraseña
@stop
@section('content')

<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
        
            <form class="sign-box" role="form" method="POST" action="{{ url('/password/email') }}">
            {{ csrf_field() }}
            
                <div class="sign-avatar">
                    <img src="template/img/logo-2-mob.png" alt="">
                </div>
                
                <header class="sign-title">Enviar correo de recuperación</header>
                
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
                
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="form-label">Dirección de correo</label>
                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ej: pepe@correo.com">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-rounded btn-warning btn-lg btn-block"><i class="fa fa-btn fa-envelope"></i> Recuperar contraseña</button>
                
                <a href="{{ url('/') }}"><button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button></a>
            </form>
        </div>
    </div>
</div><!--.page-center-->
<!--
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Restaurar contraseña</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="{{url('/')}}">Inicio</a></li>
              <li><a href="{{url('/login')}}">Inicio de sesión</a></li>
              <li class="active">Restaurar contraseña</li>
            </ol>
          </div>
        </div>
      </div>
    </header>
    <div class="row">
      <div class="col-md-8">
    <section class="card">
      <div class="card-block">

        <div class="row">
          <div class="col-xl-12">
            <div class="panel-body">
              @if (session('status'))
                  <div class="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif
              <form class="form-signin_v1" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="form-label">Dirección de correo</label>
                  <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <button type="submit" class="btn">
                      <i class="fa fa-btn fa-envelope"></i> Enviar correo de recuperación
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

      </div>
    </section>
</div></div>-->
@endsection
