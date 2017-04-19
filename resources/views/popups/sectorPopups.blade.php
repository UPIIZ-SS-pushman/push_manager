<!-- contact popup sector update             -->
<div id="updateDiv" class="backgroundPopup box-typical">
<!-- Popup Div Starts Here -->
    <div class="popupContact">
        <section class="widget">
            <header class="widget-header-dark">Actualización de sector</header>
            <div class="tab-content widget-tabs-content">

                {{Form::open(array('url'=>'/sectors', 'id'=>'formPop', 'class'=>'formPop'))}}
                {{ method_field('PATCH') }}

                    <input type="hidden" name="idPop" id="idPop" value="{{$sec->id}}">

                    
                    <!--                 sector -->
                    <fieldset class="form-group">
                        <label class="form-label">Sector</label>
                        <div class="form-control-wrapper form-control-icon-left">
                            {{Form::text('name', '', ['class'=>'form-control maxlength-custom-message', 'id'=>'namePop', 'name'=>'namePop', 'placeholder'=>'Ej: Sistemas', 'maxlength'=>'50'])}}
                            <i class="font-icon font-icon-widget"></i>
                        </div>
                    </fieldset>
                    

                    <div class="row">
                        <div class="container-fluid">
                            <label class="form-label">Tipo de usuario</label>
                            {{Form::select('tipos',
                            App\UserType::lists('name', 'id'),
                            $sec->user_type->name,
                            ['class'=>'select2 select2-hidden-accessible', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'typePop', 'name'=>'typePop'])}}
                            <br/>
                            <br/>
                        </div>
                    </div>

                            <!--             buttons -->
                    <div class="row">
                        <fieldset class="form-group">
                            <div class="col-lg-6 col-lg-offset-0 col-md-9 col-md-offset-2">
                                <button type="button" class="btn btn-rounded btn-inline btn-primary btn-lg btn-block" onclick ="updateSectorHide()">Cancelar</button>
                                </div>
                            <div class="col-lg-6 col-lg-offset-0 col-md-9 col-md-offset-2">
                                <a href="javascript:%20check_empty()" id="submitPop"><button type="button" class="btn btn-rounded btn-inline btn-warning btn-lg btn-block">Actualizar <i class="font-icon font-icon-check-bird"></i></button></a>
                            </div>
                        </fieldset>
                    </div>
                {{Form::close()}}

            </div>
            <div class="widget-tabs-nav bordered">
                <ul class="tbl-row" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#w-1-tab-1" role="tab">
                            <i class="font-icon font-icon-widget"></i>
                            Sección de sectores
                        </a>
                    </li>
                </ul>
            </div>
        </section>    
    </div>
<!-- Popup Div Ends Here -->
</div>

<!-- contact popup sector create             -->
<div id="createDiv" class="backgroundPopup box-typical">
<!-- Popup Div Starts Here -->
    <div class="popupContact">
        <section class="widget">
            <header class="widget-header-dark">Creación de sector</header>
            <div class="tab-content widget-tabs-content">
            
                {{Form::open(array('url'=>'/sectors', 'id'=>'formPop2', 'class'=>'formPop'))}}
                    {{ method_field('PUT') }}

                    
        <!--                 sector -->
                    <fieldset class="form-group">
                        <label class="form-label">Sector</label>
                        <div class="form-control-wrapper form-control-icon-left">
                            {{Form::text('name', '', ['class'=>'form-control maxlength-custom-message', 'id'=>'namePop2', 'name'=>'namePop2', 'placeholder'=>'Ej: Sistemas', 'maxlength'=>'50'])}}
                            <i class="font-icon font-icon-widget"></i>
                        </div>
                    </fieldset>
                    
                    
                    <div class="row">
                        <div class="container-fluid">
                            <label class="form-label">Tipo de usuario</label>
                            {{Form::select('tipos',
                                App\UserType::lists('name', 'id'),
                                $sec->user_type->name,
                            ['class'=>'select2 select2-hidden-accessible', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'typePop2', 'name'=>'typePop2'])}}
                            <br/>
                            <br/>
                        </div>
                    </div>

        <!--             buttons -->
                    <div class="row">
                        <fieldset class="form-group">
                            <div class="col-lg-6 col-lg-offset-0 col-md-9 col-md-offset-2">
                                <button type="button" class="btn btn-rounded btn-inline btn-primary btn-lg btn-block" onclick ="createSectorHide()">Cancelar</button>
                            </div>
                            <div class="col-lg-6 col-lg-offset-0 col-md-9 col-md-offset-2">
                                <a href="javascript:%20check_empty2()" id="submitPop"><button type="button" class="btn btn-rounded btn-inline btn-success btn-lg btn-block">Crear <i class="font-icon font-icon-check-bird"></i></button></a>
                            </div>
                        </fieldset>
                    </div>
                {{Form::close()}}
        
            </div>
            <div class="widget-tabs-nav bordered">
                <ul class="tbl-row" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#w-1-tab-1" role="tab">
                            <i class="font-icon font-icon-widget"></i>
                            Sección de sectores
                        </a>
                    </li>
                </ul>
            </div>
        </section>    
    </div>
<!-- Popup Div Ends Here -->
</div>
