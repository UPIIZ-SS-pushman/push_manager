@extends('layouts.main')

@section('title')
PushManager - Lista de sectores
@stop

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('style')
<link rel="stylesheet" href="template/css/lib/bootstrap-sweetalert/sweetalert.css"/>
<link href="template/css/popup.css" rel="stylesheet">
@stop

@section('content')

@if(Auth::user()->user_type_id == 1)

<h5 class="m-t-lg with-border m-t-0">Sectores registrados en el sistema</h5>

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

{{Form::open(array('url'=>'/sectors', 'id'=>'formDel', 'name'=>'formDel'))}}
    {{ method_field('DELETE') }}
    <input type="hidden" name="idDel" id="idDel" value="0">
{{Form::close()}}

<section class="box-typical">
    <header class="box-typical-header">
        <div class="tbl-row">
            <div class="tbl-cell tbl-cell-title">
                <h3>{{ $sectors->count() }} Sector(es)</h3>
            </div>
            <div class="tbl-cell tbl-cell-action-bordered">
                <button type="button" class="action-btn" onclick="createSectorShow()"><i class="fa fa-plus"></i></button>
            </div>
            <div class="tbl-cell tbl-cell-action-bordered">
                <button type="button" class="action-btn" onclick="delMultipleSector()" id="trash"><i class="font-icon font-icon-trash"></i></button>
            </div>
        </div>
    </header>

    <div class="pre-scrollable">
        <table id="table-edit2" class="table table-bordered table-hover pre-scrollable">
    <!--                             titles -->
            <thead>
                <tr>
                    <th width="1"></th>
                    <th width="1">ID</th>
                    <th>Nombre</th>
                    <th>Tipo de usuario</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de modificación</th>
                    <th></th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($sectors as $sec)
                <tr>
                    <td>
                        <div class="checkbox-bird red">
                            <input id="check-bird-{{$sec->id}}" name="check{{$sec->id}}" type="checkbox" value="{{$sec->id}}" onclick="delMultipleSectorArray('{{$sec->id}}')">
                            <label for="check-bird-{{$sec->id}}"></label>
                        </div>
                    </td>
            
    <!--                         begin data -->
                    <td class="table-icon-cell">{{ $sec->id }}</td>
                    <td>{{ $sec->name }}</td>
                    <td>{{ $sec->user_type->name }}</td>
                    <td class="table-icon-cell">{{ $sec->created_at }}</td>
                    <td class="table-icon-cell">{{ $sec->updated_at }}</td>
    <!--                         actions -->
                    <td style="text-align: center">
                        <button type="button" class="btn btn-inline btn-warning-outline" onclick="updateSectorShow({{$sec->id}}, '{{$sec->name}}', {{$sec->user_type_id}})"><i class="font-icon font-icon-pencil"></i></button>
                    
                        <button type="button" class="btn btn-inline btn-danger-outline" onclick="delOneSector({{$sec->id}}, '{{$sec->name}}')"><i class="font-icon font-icon-trash"></i></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
    <!--                     end titles -->
        </table>
    </div>
</section>

@include('popups.sectorPopups')

@endif

@stop

@section('scripts')
<script src="{{ URL::asset('template/js/lib/bootstrap-sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/select2/select2.full.min.js') }}"></script>

<script src="{{ URL::asset('template/js/popups/sectorPopup.js') }}"></script>

<script src="{{ URL::asset('template/js/lib/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/bootstrap-maxlength/bootstrap-maxlength-init.js') }}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stop
