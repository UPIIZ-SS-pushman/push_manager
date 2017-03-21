@extends('layouts.main')
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop
@section('title')
PushManager - Mensajes del administrador
@stop
@section('style')
<link rel="stylesheet" href="template/css/lib/bootstrap-sweetalert/sweetalert.css"/>
<link href="template/css/popup.css" rel="stylesheet">
@stop

@section('content')
<h5 class="m-t-lg with-border m-t-0">Mensajes del administrador</h5>

<section class="box-typical">
  <header class="box-typical-header">
    <div class="tbl-row">
      <div class="tbl-cell tbl-cell-title">
        <h3>{{\App\AdminMessage::count()}} mensaje(s)</h3>
      </div>
      <div class="tbl-cell tbl-cell-action-bordered">
        <button id="button-delete" type="button" class="action-btn"><i class="font-icon font-icon-trash"></i></button>
      </div>
    </div>
  </header>
  <div class="box-typical-body">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th class="table-check">
              <div class="checkbox checkbox-only">
                <input type="checkbox" id="table-check-head"/>
                <label for="table-check-head"></label>
              </div>
            </th>
            <th> </th>
            <th>Contenido</th>
            <th>Recibido</th>
            <th>Usuario</th>
          </tr>
        </thead>
        <tbody>
          @foreach(\App\AdminMessage::all() as $message)
            <tr>
              <td class="table-check">
                <div class="checkbox checkbox-only">
                  <input type="checkbox" id="table-check-{{$message->id}}" class="table-check" value="{{$message->id}}">
                  <label for="table-check-{{$message->id}}"></label>
                </div>
              </td>
              <td>
                @if($message->read)
                  <i class="font-icon font-icon-check-circle"></i>
                @endif
              </td>
              <td class="color-blue-grey-lighter"><a href="viewMessage/{{$message->id}}">{{str_limit($message->body_message, $limit = 50, $end = "...")}}</a></td>
              <td class="table-date">{{$message->sent_date}}</td>
              <td class="table-photo">
                {{$message->user->name}} {{$message->user->lastname}}
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div><!--.box-typical-body-->
</section><!--.box-typical-->

@stop

@section('scripts')

<script src="{{ URL::asset('template/js/lib/table-edit/jquery.tabledit.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/bootstrap-sweetalert/sweetalert.min.js') }}"></script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script src="{{ URL::asset('template/js/popups/adminMessagesPopup.js') }}"></script>
<script>
  $('#table-check-head').change(function(){
    $('.table-check').prop('checked', this.checked);
  });
  $('#button-delete').click(function(){
    deleteAdminMessages();
  });

</script>

@stop
