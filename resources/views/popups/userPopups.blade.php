<!-- contact popup user update             -->
<div id="updateDiv" class="backgroundPopup box-typical">
<!-- Popup Div Starts Here -->
<div class="popupContact">
        <section class="widget">
            <header class="widget-header-dark">Actualización de usuario</header>
            <div class="tab-content widget-tabs-content">
            
                <!-- Contact Us Form -->
                {{Form::open(array('url'=>'/users', 'id'=>'formPop', 'class'=>'formPop'))}}
                    {{ method_field('PATCH') }}
                    
                    <input type="hidden" name="idPop" id="idPop" value="{{$us->id}}">

                    <div class="row">
        <!--                 user -->
                        <fieldset class="form-group">
                            <label class="form-label">Usuario</label>
                            <div class="form-control-wrapper form-control-icon-left">
                                {{Form::text('user', $us->username, ['class'=>'form-control maxlength-custom-message', 'id'=>'userPop', 'name'=>'userPop', 'placeholder'=>'Ej: pepe1', 'maxlength'=>'15'])}}
                                <i class="font-icon font-icon-user"></i>
                            </div>
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Nombre(s)</label>
                            <div class="form-control-wrapper form-control-icon-left">
                                {{Form::text('name', $us->name, ['class'=>'form-control maxlength-custom-message', 'id'=>'namePop', 'name'=>'namePop', 'placeholder'=>'Ej: pedro', 'maxlength'=>'30'])}}
                                <i class="font-icon font-icon-user"></i>
                            </div>
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label class="form-label">Apellidos</label>
                            <div class="form-control-wrapper form-control-icon-left">
                                {{Form::text('lastname', $us->lastname, ['class'=>'form-control maxlength-custom-message', 'id'=>'lastnamePop', 'name'=>'lastnamePop', 'placeholder'=>'Ej: Peres', 'maxlength'=>'30'])}}
                                <i class="font-icon font-icon-user"></i>
                            </div>
                        </fieldset>
                        
        <!--                 email -->
                        <fieldset class="form-group">
                            <label class="form-label">Correo</label>
                            <div class="form-control-wrapper form-control-icon-left">
                                {{Form::email('email', $us->email, ['class'=>'form-control maxlength-custom-message', 'id'=>'emailPop', 'name'=>'emailPop', 'placeholder'=>'Ej: ejemplo@correo.com', 'maxlength'=>'25'])}}
                                <i class="font-icon font-icon-earth"></i>
                            </div>
                        </fieldset>
                        
        <!--                 type -->                       
                        <div class="row">
                            <div class="container-fluid">
                                <label class="form-label">Tipo</label>
                                {{Form::select('tipos',
                                    App\UserType::lists('name', 'id'),
                                    $us->user_type->name,
                                ['class'=>'select2', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'typePop', 'name'=>'typePop'])}}
                                <br/>
                                <br/>
                            </div>
                        </div>
                        
        <!--                 sector -->
                        <div class="row">
                            <div class="container-fluid">
                                <label class="form-label">Sector</label>
                                {{Form::select('grupos',
                                    App\Sector::lists('name', 'id'),
                                    $us->sector->name,
                                ['class'=>'select2', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'sectorPop', 'name'=>'sectorPop'])}}
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>

        <!--             buttons -->
                    <div class="row">
                        <fieldset class="form-group">
                            <div class="col-lg-6 col-lg-offset-0 col-md-9 col-md-offset-2">
                                <button type="button" class="btn btn-rounded btn-inline btn-primary btn-lg btn-block" onclick ="updateUserHide()">Cancelar</button>
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
                            <i class="font-icon font-icon-user"></i>
                            Sección de usuarios
                        </a>
                    </li>
                </ul>
            </div>
        </section>    
    </div>
<!-- Popup Div Ends Here -->
</div>

<!-- ------------------------------------------------------------------------ -->

<!-- contact popup user create            -->
<div id="createDiv" class="backgroundPopup box-typical">
<!-- Popup Div Starts Here -->
    <div class="popupContact">
        <section class="widget">
            <header class="widget-header-dark">Nuevo usuario</header>
            <div class="tab-content widget-tabs-content">
                            
                <!-- Contact Us Form -->
                {{Form::open(array('url'=>'/users', 'id'=>'formPop2', 'class'=>'formPop'))}}
                    {{ method_field('PUT') }}

                    <div class="row">
        <!--                 user -->
                        <fieldset class="form-group">
                            <label class="form-label">Usuario</label>
                            <div class="form-control-wrapper form-control-icon-left">
                                {{Form::text('user', '', ['class'=>'form-control maxlength-custom-message', 'id'=>'userPop2', 'name'=>'userPop2', 'placeholder'=>'Ej: pepe1', 'maxlength'=>'15'])}}
                                <i class="font-icon font-icon-user"></i>
                            </div>
                        </fieldset>
                        
        <!--                 TODO dar formato a los campos y pasar los datos al javascript y realizar las consultas -->
                        
                        <fieldset class="form-group">
                            <label class="form-label">Contraseña</label>
                            {{Form::password('pass', ['name'=>'passwordPop2', 'id'=>'passwordPop2', 'class'=>'form-control maxlength-custom-message', 'placeholder'=>'Ej: 49f9e1', 'maxlength'=>'30'])}}
                        </fieldset>

                        <fieldset class="form-group">
                            <label class="form-label">Nombre(s)</label>
                            <div class="form-control-wrapper form-control-icon-left">
                                {{Form::text('name', '', ['class'=>'form-control maxlength-custom-message', 'id'=>'namePop2', 'name'=>'namePop2', 'placeholder'=>'Ej: pedro', 'maxlength'=>'30'])}}
                                <i class="font-icon font-icon-user"></i>
                            </div>
                        </fieldset>
                        
                        <fieldset class="form-group">
                            <label class="form-label">Apellidos</label>
                            <div class="form-control-wrapper form-control-icon-left">
                                {{Form::text('lastname', '', ['class'=>'form-control maxlength-custom-message', 'id'=>'lastnamePop2', 'name'=>'lastnamePop2', 'placeholder'=>'Ej: Peres', 'maxlength'=>'30'])}}
                                <i class="font-icon font-icon-user"></i>
                            </div>
                        </fieldset>
                        
        <!--                 email -->
                        <fieldset class="form-group">
                            <label class="form-label">Correo</label>
                            <div class="form-control-wrapper form-control-icon-left">
                                {{Form::email('email', '', ['class'=>'form-control maxlength-custom-message', 'id'=>'emailPop2', 'name'=>'emailPop2', 'placeholder'=>'Ej: ejemplo@correo.com', 'maxlength'=>'25'])}}
                                <i class="font-icon font-icon-earth"></i>
                            </div>
                        </fieldset>
                        
        <!--                 type -->
                        <div class="row">
                            <div class="container-fluid">
                                <label class="form-label">Tipo</label>
                                {{Form::select('tipos',
                                    App\UserType::lists('name', 'id'),
                                    $us->user_type->name,
                                ['class'=>'select2 select2-hidden-accessible', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'typePop2', 'name'=>'typePop2'])}}
                                <br/>
                                <br/>
                            </div>
                        </div>
                        
        <!--                 sector -->
                        <div class="row">
                            <div class="container-fluid">
                                <label class="form-label">Tipo</label>
                                {{Form::select('grupos',
                                    App\Sector::lists('name', 'id'),
                                    $us->sector->name,
                                ['class'=>'select2 select2-hidden-accessible', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'sectorPop2', 'name'=>'sectorPop2'])}}
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>

        <!--             buttons -->
                    <div class="row">
                        <fieldset class="form-group">
                            <div class="col-lg-6 col-lg-offset-0 col-md-9 col-md-offset-2">
                                <button type="button" class="btn btn-rounded btn-inline btn-primary btn-lg btn-block" onclick ="createUserhide()">Cancelar</button>
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
                            <i class="font-icon font-icon-user"></i>
                            Sección de usuarios
                        </a>
                    </li>
                </ul>
            </div>
        </section>    
    </div>
<!-- Popup Div Ends Here -->
</div>
