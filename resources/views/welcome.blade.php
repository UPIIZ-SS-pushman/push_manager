@extends('layouts.app')
@section('title')
PushManager
@stop
@section('content')
<!--<header class="section-header">
      <div class="tbl">
        <div class="tbl-row">
          <div class="tbl-cell">
            <h3>Bienvenido</h3>
          </div>
        </div>
      </div>
    </header>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">

                <div class="panel-body">
                    <a href="{{url('/login')}}">Inicia sesión para continuar</a>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            <form class="sign-box">
            
                <div class="sign-avatar">
                    <img src="template/img/logo-2-mob.png" alt="">
                </div>
                
                <header class="sign-title">Bienvenido</header>
                
                <label class="form-label">Para continuar...</label>
                <a href="{{ url('/login') }}"><button type="button" class="btn btn-rounded btn-lg btn-block">Inicia sesión</button></a>
                
            </form>
        </div>
    </div>
</div><!--.page-center-->

@endsection
