@extends('layouts.app')
@section('title')
PushManager - Recuperar contraseña
@stop
@section('content')
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
</div></div>
@endsection
