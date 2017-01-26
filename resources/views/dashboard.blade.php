@extends('layout')

@section('title')
PushManager - Página principal
@stop
@section('content')
<h5 class="m-t-lg with-border m-t-0">Página principal</h5>

        <div class="row">
            <div class="col-xl-8 dahsboard-column">
                <section class="box-typical box-typical-dashboard panel panel-default">
                    <header class="box-typical-header panel-heading">
                        <h3 class="panel-title">Anuncios</h3>
                    </header>
                    <div class="box-typical-body panel-body">
                        @include('components.imageSlideshow')
                    </div><!--.box-typical-body-->
                </section>
            </div><!--.col-->
        </div><!--.row-->

        <div class="row">
          <div class="col-xl-6 dahsboard-column">
              <section class="box-typical box-typical-dashboard panel panel-default">
                  <header class="box-typical-header panel-heading">
                      <h3 class="panel-title">Notificación rápida</h3>
                  </header>
                  <div class="box-typical-body panel-body">
                          <!-- <div class="user-card-row">
                              <div class="tbl-row">
                                  <div class="tbl-cell tbl-cell-photo">
                                      <a href="#">
                                          <img src="img/photo-64-1.jpg" alt="">
                                      </a>
                                  </div>
                                  <div class="tbl-cell">
                                      <span class="user-card-row-name"><a href="#">Contenido</a></span>
                                  </div>
                                  <div class="tbl-cell tbl-cell-date">
                                      <span class="semibold">Today</span>
                                      12:45
                                  </div>
                              </div>
                          </div> -->
                          <form method="POST" action="/quick">
                          <div class="comment-item-txt">
                              <label class="form-control-label">Título</label>
                              <input class="form-control" placeholder="Título" name="title" type="text">
                              <label class="form-control-label">Contenido</label>
                              <textarea rows="2" class="form-control" placeholder="Contenido" name="body" cols="50"></textarea>
                              <button type="submit" class="btn btn-rounded btn-success float-right">Enviar <i class="font-icon font-icon-check-bird"></i></button>
                          </div>
                          </form>
                      
                  </div><!--.box-typical-body-->
              </section>
          </div><!--.col-->

          <div class="col-xl-6">
                <div class="row">
                    <div class="col-sm-6">
                        <article class="statistic-box red">
                            <div>
                                <div class="number">26</div>
                                <div class="caption"><div>Usuarios registrados</div></div>
                            </div>
                        </article>
                    </div><!--.col-->
                    <div class="col-sm-6">
                        <article class="statistic-box purple">
                            <div>
                                <div class="number">12</div>
                                <div class="caption"><div>Notificaciones enviadas</div></div>
                            </div>
                        </article>
                    </div><!--.col-->
                    <div class="col-sm-6">
                        <article class="statistic-box yellow">
                            <div>
                                <div class="number">104</div>
                                <div class="caption"><div>Mensajes al administrador</div></div>
                            </div>
                        </article>
                    </div><!--.col-->

                </div><!--.row-->
            </div><!--.col-->

        </div><!--.row-->

        <div class="row">
            <div class="col-xl-8 dahsboard-column">
                <section class="box-typical box-typical-dashboard panel panel-default">
                    <header class="box-typical-header panel-heading">
                        <h3 class="panel-title">Edición de anuncios</h3>
                    </header>
                    <div class="box-typical-body panel-body">
                        @include('components.imageSlideshowUpload')
                    </div><!--.box-typical-body-->
                </section>
            </div><!--.col-->
        </div><!--.row-->
@stop

@section('scripts')
<script>
  $(document).ready(function(){
    var div = document.getElementById('div-gallery').parentElement;
    div.style.height = "100%";
  });

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

  <script src="{{ URL::asset('template/js/lib/jqueryui/jquery-ui.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/lib/lobipanel/lobipanel.min.js') }}"></script>
  <script src="{{ URL::asset('template/js/lib/match-height/jquery.matchHeight.min.js') }}"></script>
@stop
