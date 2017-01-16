<!-- <link rel="stylesheet" href="/css/build/css/separate/main.css"> -->
@extends('layout')

@section('content')

              <h5 class="m-t-lg with-border m-t-0">Usuarios registrados en el sistema</h5>


            <section class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">
          <article class="panel">
            <div class="panel-heading" role="tab" id="headingOne">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                Sistemas computacionales
                <i class="font-icon font-icon-arrow-down"></i>
              </a>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
              <div class="panel-collapse-in">

                <section class="box-typical">

              <header class="box-typical-header">
                <div class="tbl-row">
                  <div class="tbl-cell tbl-cell-title">
                    <h3>3 Usuarios</h3>
                  </div>
                  <!--<div class="tbl-cell tbl-cell-action-bordered">
                    <button type="button" class="action-btn"><i class="font-icon font-icon-pencil"></i></button>
                  </div>-->
                  <div class="tbl-cell tbl-cell-action-bordered">
                    <button type="button" class="action-btn"><i class="font-icon font-icon-trash"></i></button>
                  </div>
                </div>
              </header>

              <table id="table-edit2" class="table table-bordered table-hover">
                <thead>
                <tr>
                          <th></th>
                  <th width="1">ID</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                          <th>Tipo</th>
                          <th width="300">Sector</th>
                          <th>Fecha de creación</th>

                  <!--<th class="table-icon-cell">
                    <i class="font-icon font-icon-heart"></i>
                  </th>
                  <th class="table-icon-cell">
                    <i class="font-icon font-icon-comment"></i>
                  </th>-->

                  <th>Usuario</th>
                  <th></th>
                </tr>
                </thead>

                <tbody>
                  <tr>
                              <td>
                  <div class="checkbox checkbox-only">
                    <input id="table-check-1" type="checkbox">
                    <label for="table-check-1"></label>
                  </div>
                              </td>

                    <td>1</td>
                    <td>Edu Javier Reyes</td>
                    <td>email@correo.com.mx</td>
                              <td class="table-icon-cell">Alumno</td>
                              <td class="table-icon-cell">Sistemac computacionales</td>
                              <td class="table-icon-cell">01/01/2017</td>
                    <!--<td class="table-icon-cell">5</td>
                    <td class="table-icon-cell">24</td>-->
                    <td class="table-photo">
                      <img src="template/img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                    </td>

                    <td>

                                  <button type="button" class="btn btn-inline btn-warning-outline"><i class="font-icon font-icon-pencil"></i></button>
                                  <button type="button" class="btn btn-inline btn-danger-outline"><i class="font-icon font-icon-trash"></i></button>

                              </td>
                  </tr>


                </tbody>
              </table>
            </section><!--.box-typical-->

              </div>
            </div>
          </article>

          <article class="panel">
            <div class="panel-heading" role="tab" id="headingTwo">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="collapsed">
                Mecatronica
                <i class="font-icon font-icon-arrow-down"></i>
              </a>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
              <div class="panel-collapse-in">

                <section class="box-typical">

              <header class="box-typical-header">
                <div class="tbl-row">
                  <div class="tbl-cell tbl-cell-title">
                    <h3>2Usuarios</h3>
                  </div>
                  <div class="tbl-cell tbl-cell-action-bordered">
                    <button type="button" class="action-btn"><i class="font-icon font-icon-pencil"></i></button>
                  </div>
                  <div class="tbl-cell tbl-cell-action-bordered">
                    <button type="button" class="action-btn"><i class="font-icon font-icon-trash"></i></button>
                  </div>
                </div>
              </header>

              <table id="table-edit" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th width="1">ID</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                          <th>Tipo</th>
                          <th width="300">Sector</th>
                          <th>Fecha de creación</th>

                  <th class="table-icon-cell">
                    <i class="font-icon font-icon-heart"></i>
                  </th>
                  <th class="table-icon-cell">
                    <i class="font-icon font-icon-comment"></i>
                  </th>

                  <th></th>
                </tr>
                </thead>

                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Edu Javier Reyes</td>
                    <td>email@correo.com.mx</td>
                              <td class="table-icon-cell">Alumno</td>
                              <td class="table-icon-cell">Sistemac computacionales</td>
                              <td class="table-icon-cell">01/01/2017</td>
                    <td class="table-icon-cell">5</td>
                    <td class="table-icon-cell">24</td>
                    <td class="table-photo">
                      <img src="template/img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
                    </td>
                  </tr>


                </tbody>
              </table>
            </section><!--.box-typical-->

              </div>
            </div>
          </article>


        </section>


@stop

@section('scripts')
<script src="template/js/lib/table-edit/jquery.tabledit.min.js"></script>
<script>
$(function () {
  $('#table-edit').Tabledit({
    url: 'example.php',
    columns: {
      identifier: [0, 'id'],
      editable: [[1, 'nombre'], [2, 'correo'], [3, 'tipo'], [4, 'sector']]
    }
  });
});
</script>
@stop
