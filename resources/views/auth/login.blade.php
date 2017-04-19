@extends('layouts.app')
@section('title')
PushManager - Iniciar sesión
@stop
@section('content')

<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            <form class="sign-box" role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            
                <div class="sign-avatar">
                    <img src="template/img/logo-2-mob.png" alt="">
                </div>
                
                <header class="sign-title">Iniciar sesión</header>
                
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
                    <label for="email" class="form-label">Correo electrónico</label>
                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ej: pepe@correo.com">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="form-label">Contraseña</label>
                    <div>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Ej: Ad135">
                    </div>
                </div>
                
                <div class="form-group form-group-checkbox">
                    <div class="checkbox">
                        <input id="signup_v2-agree" name="signup_v2[agree]" type="checkbox">
                        <label for="signup_v2-agree">Recordarme</a></label>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-rounded btn-lg btn-block"><i class="fa fa-btn fa-sign-in"></i> Entrar</button>
                
                <div class="sign-note">
                    <div>
                        <a href="{{ url('/password/reset') }}">¡Olvide mi contraseña!</a>
                    </div>
                </div>
                
                <p class="sign-note">¿Nuevo en el sitio? <a href="{{ url('/register') }}">Registrame</a></p>
                
                <a href="{{ url('/') }}"><button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button></a>
            </form>
        </div>
    </div>
</div><!--.page-center-->

@endsection
