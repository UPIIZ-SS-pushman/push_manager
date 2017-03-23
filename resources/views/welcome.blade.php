@extends('layouts.app')
@section('title')
PushManager
@stop
@section('content')
<header class="section-header">
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
</div>
@endsection
