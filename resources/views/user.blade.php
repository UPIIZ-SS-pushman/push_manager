@extends('layouts.main')

@section('title')
PushManager - Lista de usuarios
@stop

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('style')
<link rel="stylesheet" href="template/css/lib/bootstrap-sweetalert/sweetalert.css"/>
<link href="template/css/popup.css" rel="stylesheet">
@stop

@section('content')

<h5 class="m-t-lg with-border m-t-0">Usuarios registrados en el sistema</h5>

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

{{Form::open(array('url'=>'/users', 'id'=>'formDel', 'name'=>'formDel'))}}
    {{ method_field('DELETE') }}
    <input type="hidden" name="idDel" id="idDel" value="0">
{{Form::close()}}

<section class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true" style="z-index: 1;">
<?php $counter = 0;

$converter = array(
 "",
 "One",
 "Two",
 "Three",
 "Four",
 "Five",
 "Six",
 "Seven",
 "Eight",
 "Nine",
 "Ten",
 "Eleven",
 "Twelve",
 "Thirteen",
 "Fourteen",
 "Fifteen",
 "Sixteen",
 "Seventeen",
 "Eighteen",
 "Nineteen"
);

?>
@if(Auth::user()->user_type_id == 1)
@foreach($sectors as $sec)

<?php
    $counter++;
    $index = $converter[$counter];
?>
    <article class="panel">
        <div class="panel-heading" role="tab" id="heading{{$index}}">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$index}}" aria-expanded="false" aria-controls="collapse{{$index}}" class="collapsed">
                {{ $sec->name }}
                <i class="font-icon font-icon-arrow-down"></i>
            </a>
        </div>
<!--         content -->
        <div id="collapse{{$index}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$index}}" aria-expanded="false" style="height: 0px;">
            <div class="panel-collapse-in">
<!--                 begin table -->
                <section class="box-typical">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>{{ $sec->users->count() }} Usuario(s)</h3>
                            </div>
                            <div class="tbl-cell tbl-cell-action-bordered">
                                <button type="button" class="action-btn" onclick="createUserShow({{ $sec->id }})"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="tbl-cell tbl-cell-action-bordered">
                                <button type="button" class="action-btn" onclick="delMultipleUser()" id="trash"><i class="font-icon font-icon-trash"></i></button>
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
                                    <th>Usuario</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Tipo</th>
<!--                                     <th>Sector</th> -->
                                    <th>Fecha de creación</th>
                                    <th>Fecha de modificación</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($sec->users as $us)
                                <tr>
                                    <td>
                                        @unless(Auth::user()->id == $us->id)
                                        <div class="checkbox-bird red">
                                            <input id="check-bird-{{$us->id}}" name="check{{$us->id}}" type="checkbox" value="{{$us->id}}" onclick="delMultipleUserArray('{{$us->id}}')">
                                            <label for="check-bird-{{$us->id}}"></label>
                                        </div>
                                        @endunless
                                    </td>

    <!--                         begin data -->
                                    <td class="table-icon-cell">{{ $us->id }}</td>
                                    <td>{{ $us->username }}</td>
                                    <td>{{ $us->name }}</td>
                                    <td>{{ $us->lastname }}</td>
                                    <td>{{ $us->email }}</td>
                                    <td>{{ $us->user_type->name }}</td>
<!--                                     <td>{{ $us->sector->name }}</td> -->
                                    <td class="table-icon-cell">{{ $us->created_at }}</td>
                                    <td class="table-icon-cell">{{ $us->updated_at }}</td>
    <!--                         actions -->

                                    <td style="text-align: center">
                                            <button type="button" class="btn btn-inline btn-warning-outline" onclick="updateUserShow({{$us->id}}, '{{$us->username}}', '{{$us->name}}', '{{$us->lastname}}', '{{$us->email}}', {{$us->user_type_id}}, {{$us->sector_id}} )"><i class="font-icon font-icon-pencil"></i></button>
                                        @unless(Auth::user()->id == $us->id)
                                            <button type="button" class="btn btn-inline btn-danger-outline" onclick="delOneUser({{$us->id}}, '{{$us->username}}', '{{$us->user_type->name}}')"><i class="font-icon font-icon-trash"></i></button>
                                        @endunless
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
<!--                     end titles -->
                        </table>
                     </div>
                </section>
            </div>
        </div>
    </article>
@endforeach
@elseif(Auth::user()->user_type_id == 3)
@foreach($sectors as $sec)

    @if(Auth::user()->sector_id == $sec->id)
<?php
    $counter++;
    $index = $converter[$counter];
?>
    <article class="panel">
        <div class="panel-heading" role="tab" id="heading{{$index}}">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$index}}" aria-expanded="false" aria-controls="collapse{{$index}}" class="collapsed">
                {{ $sec->name }}
                <i class="font-icon font-icon-arrow-down"></i>
            </a>
        </div>
<!--         content -->
        <div id="collapse{{$index}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$index}}" aria-expanded="false" style="height: 0px;">
            <div class="panel-collapse-in">
<!--                 begin table -->
                <section class="box-typical">
                    <header class="box-typical-header">
                        <div class="tbl-row">
                            <div class="tbl-cell tbl-cell-title">
                                <h3>{{ $sec->users->count() }} Usuario(s)</h3>
                            </div>
                            <div class="tbl-cell tbl-cell-action-bordered">
                                <button type="button" class="action-btn" onclick="createUserShow({{ $sec->id }})"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="tbl-cell tbl-cell-action-bordered">
                                <button type="button" class="action-btn" onclick="delMultipleUser()" id="trash"><i class="font-icon font-icon-trash"></i></button>
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
                                    <th>Usuario</th>
                                    <th>Nombre(s)</th>
                                    <th>Apellidos</th>
                                    <th>Correo</th>
                                    <th>Tipo</th>
<!--                                     <th>Sector</th> -->
                                    <th>Fecha de creación</th>
                                    <th>Fecha de modificación</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($sec->users as $us)
                                <tr>
                                    <td>
                                    @unless($us->user_type->id == 1)
                                        @unless(Auth::user()->id == $us->id)
                                        <div class="checkbox-bird red">
                                            <input id="check-bird-{{$us->id}}" name="check{{$us->id}}" type="checkbox" value="{{$us->id}}" onclick="delMultipleUserArray('{{$us->id}}')">
                                            <label for="check-bird-{{$us->id}}"></label>
                                        </div>
                                        @endunless
                                    @endunless
                                    </td>

    <!--                         begin data -->
                                    <td class="table-icon-cell">{{ $us->id }}</td>
                                    <td>{{ $us->username }}</td>
                                    <td>{{ $us->name }}</td>
                                    <td>{{ $us->lastname }}</td>
                                    <td>{{ $us->email }}</td>
                                    <td>{{ $us->user_type->name }}</td>
<!--                                     <td>{{ $us->sector->name }}</td> -->
                                    <td class="table-icon-cell">{{ $us->created_at }}</td>
                                    <td class="table-icon-cell">{{ $us->updated_at }}</td>
    <!--                         actions -->

                                    <td style="text-align: center">
                                    @unless($us->user_type->id == 1)
                                            <button type="button" class="btn btn-inline btn-warning-outline" onclick="updateUserShow({{$us->id}}, '{{$us->username}}', '{{$us->name}}', '{{$us->lastname}}', '{{$us->email}}', {{$us->user_type_id}}, {{$us->sector_id}} )"><i class="font-icon font-icon-pencil"></i></button>
                                        @unless(Auth::user()->id == $us->id)
                                            <button type="button" class="btn btn-inline btn-danger-outline" onclick="delOneUser({{$us->id}}, '{{$us->username}}', '{{$us->user_type->name}}')"><i class="font-icon font-icon-trash"></i></button>
                                        @endunless
                                    @endunless
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
<!--                     end titles -->
                        </table>
                     </div>
                </section>
            </div>
        </div>
    </article>
    @endif

@endforeach
@endif

</section>

@include('popups.userPopups')

@stop

@section('scripts')
<script src="{{ URL::asset('template/js/lib/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/select2/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/bootstrap-sweetalert/sweetalert.min.js') }}"></script>
<script>var postRoute = "{{url('/users')}}";</script>
<script src="{{ URL::asset('template/js/popups/userPopup.js') }}"></script>

<script src="{{ URL::asset('template/js/lib/hide-show-password/bootstrap-show-password.min.js') }}"></script>
<script src="{{ URL::asset('template/js/lib/hide-show-password/bootstrap-show-password-init.js') }}"></script>
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
