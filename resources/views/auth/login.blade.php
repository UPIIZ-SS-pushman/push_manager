@extends('layouts.app')
@section('title')
PushManager - Iniciar sesión
@stop
@section('content')
    <header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Iniciar sesión</h3>
            <ol class="breadcrumb breadcrumb-simple">
              <li><a href="/">Inicio</a></li>
              <li class="active">Inicio de sesión</li>
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
              <form class="form-signin_v1" role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  <label for="email" class="form-label">Correo electrónico</label>
                  <div>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                    @if ($errors->has('email'))
                    <span class="help-block">
                      <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="form-label">Contraseña</label>
                  <div>
                    <input id="password" type="password" class="form-control" name="password">
                    @if ($errors->has('password'))
                    <span class="help-block">
                      <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group form-group-checkbox">
                  <div class="checkbox">
                    <input id="signup_v2-agree" name="signup_v2[agree]" type="checkbox">
                    <label for="signup_v2-agree">Recordarme</a></label>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <button type="submit" class="btn">
                      <i class="fa fa-btn fa-sign-in"></i> Iniciar sesión
                    </button>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6">
                    <a class="btn btn-link" href="{{ url('/password/reset') }}">¿Olvidaste tu contraseña?</a>
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
