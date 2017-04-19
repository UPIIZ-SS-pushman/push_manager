@extends('layouts.app')

@section('content')


<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            <form class="sign-box" role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}
            
                <input type="hidden" name="token" value="{{ $token }}">
            
                <div class="sign-avatar">
                    <img src="template/img/Upiiz-logo.png" alt="">
                </div>
                
                <header class="sign-title">Reiniciar contraseña</header>
                
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
                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Ej: pepe@correo.com">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="form-label">Contraseña</label>
                    <div>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Ej: Ad135">
                    </div>
                </div>
                
                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                    <label for="password" class="form-label">Confirmar contraseña</label>
                    <div>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ej: Ad135">
                    </div>
                </div>
                
                <button type="submit" class="btn btn-rounded btn-danger btn-lg btn-block"><i class="fa fa-btn fa-refresh"></i> Reiniciar contraseña</button>
                
                <a href="{{ url('/') }}"><button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button></a>
            </form>
        </div>
    </div>
</div><!--.page-center-->
<!--

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reiniciar contraseña</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Dirección de correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-refresh"></i> Reiniciar contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
