  <!-- <link rel="stylesheet" href="/css/build/css/separate/main.css"> -->
@extends('layout')

@section('content')

  							<h5 class="m-t-lg with-border m-t-0">Usuarios registrados en el sistema</h5>

              <section class="box-typical">

                <header class="box-typical-header">
                  <div class="tbl-row">
                    <div class="tbl-cell tbl-cell-title">
                      <h3>Sistemas computacionales - 3 Usuarios</h3>
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
                    <th>Puesto</th>
          					<th class="table-icon-cell">
          						<i class="font-icon font-icon-heart"></i>
          					</th>
          					<th class="table-icon-cell">
          						<i class="font-icon font-icon-comment"></i>
          					</th>
          					<th width="300">Carrera</th>
          					<th></th>
          				</tr>
          				</thead>

          				<tbody>
          					<tr>
          						<td>1</td>
          						<td>Edu J.</td>
          						<td>email@correo.com.mx</td>
                      <td class="table-icon-cell">Alumno</td>
          						<td class="table-icon-cell">5</td>
          						<td class="table-icon-cell">24</td>
          						<td class="color-blue-grey-lighter">Sistemas computacionales</td>
          						<td class="table-photo">
          							<img src="template/img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
          						</td>
          					</tr>

                    <tr>
          						<td>1</td>
          						<td>Edu J.</td>
          						<td>email@correo.com.mx</td>
                      <td class="table-icon-cell">Alumno</td>
          						<td class="table-icon-cell">5</td>
          						<td class="table-icon-cell">24</td>
          						<td class="color-blue-grey-lighter">Sistemas computacionales</td>
          						<td class="table-photo">
          							<img src="template/img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
          						</td>
          					</tr>

                    <tr>
          						<td>1</td>
          						<td>Edu J.</td>
          						<td>email@correo.com.mx</td>
                      <td class="table-icon-cell">Alumno</td>
          						<td class="table-icon-cell">5</td>
          						<td class="table-icon-cell">24</td>
          						<td class="color-blue-grey-lighter">Sistemas computacionales</td>
          						<td class="table-photo">
          							<img src="template/img/photo-64-1.jpg" alt="" data-toggle="tooltip" data-placement="bottom" title="Nicholas<br/>Barrett">
          						</td>
          					</tr>
          				</tbody>
          			</table>
              </section><!--.box-typical-->


@stop

@section('scripts')
<script src="template/js/lib/table-edit/jquery.tabledit.min.js"></script>
<script>
  $(function () {
    $('#table-edit').Tabledit({
      url: 'example.php',
      columns: {
        identifier: [0, 'id'],
        editable: [[1, 'nombre'], [2, 'correo'], [3, 'puesto'], [6, 'carrera']]
      }
    });
  });
</script>
@stop
