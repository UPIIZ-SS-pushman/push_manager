<!-- contact popup user update             -->
<div id="updateUserDiv">
<!-- Popup Div Starts Here -->
    <div id="popupContact">
    <!-- Contact Us Form -->
        {{Form::open(array('url'=>'/users', 'id'=>'formPop', 'class'=>'box-typical'))}}
            {{ method_field('PATCH') }}
            <h2 class="m-t-lg with-border m-t-0">Edición de campos</h2>
            
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
                <fieldset class="form-group">
                    <label class="form-label">Tipo</label>
                    {{Form::select('tipos',
                            App\UserType::lists('name', 'id'),
                            $us->user_type->name,
                        ['class'=>'select2 select2-hidden-accessible', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'typePop', 'name'=>'typePop'])}}
                </fieldset>
                
<!--                 sector -->
                <fieldset class="form-group">
                    <label class="form-label">Sector</label>
                    {{Form::select('grupos',
                            App\Sector::lists('name', 'id'),
                            $us->sector->name,
                        ['class'=>'select2 select2-hidden-accessible', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'sectorPop', 'name'=>'sectorPop'])}}
                </fieldset>
            </div>

<!--             buttons -->
            <div class="row">
                <fieldset class="form-group">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-rounded btn-inline btn-primary" onclick ="updateUserHide()">Cancelar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="javascript:%20check_empty()" id="submitPop"><button type="button" class="btn btn-rounded btn-inline btn-warning">Actualizar <i class="font-icon font-icon-check-bird"></i></button></a>
                    </div>
                </fieldset>
            </div>
        {{Form::close()}}
    </div>
<!-- Popup Div Ends Here -->
</div>

<!-- ------------------------------------------------------------------------ -->

<!-- contact popup user create            -->
<div id="createUserDiv">
<!-- Popup Div Starts Here -->
    <div id="popupContact">
    <!-- Contact Us Form -->
        {{Form::open(array('url'=>'/users', 'id'=>'formPop2', 'class'=>'box-typical'))}}
            {{ method_field('PUT') }}
            <h2 class="m-t-lg with-border m-t-0">Nuevo usuario</h2>

            <div class="row">
<!--                 user -->
                <fieldset class="form-group">
                    <label class="form-label">Usuario</label>
                    <div class="form-control-wrapper form-control-icon-left">
                        {{Form::text('user', $us->username, ['class'=>'form-control maxlength-custom-message', 'id'=>'userPop2', 'name'=>'userPop2', 'placeholder'=>'Ej: pepe1', 'maxlength'=>'15'])}}
                        <i class="font-icon font-icon-user"></i>
                    </div>
                </fieldset>
                
<!--                 TODO dar formato a los campos y pasar los datos al javascript y realizar las consultas -->
                
                <fieldset class="form-group">
                    <label class="form-label">Contraseña</label>
                    {{Form::password('pass', ['id'=>'password', 'class'=>'form-control maxlength-custom-message', 'placeholder'=>'Ej: 49f9e1', 'maxlength'=>'30'])}}
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nombre(s)</label>
                    <div class="form-control-wrapper form-control-icon-left">
                        {{Form::text('name', $us->name, ['class'=>'form-control maxlength-custom-message', 'id'=>'namePop2', 'name'=>'namePop2', 'placeholder'=>'Ej: pedro', 'maxlength'=>'30'])}}
                        <i class="font-icon font-icon-user"></i>
                    </div>
                </fieldset>
                
                <fieldset class="form-group">
                    <label class="form-label">Apellidos</label>
                    <div class="form-control-wrapper form-control-icon-left">
                        {{Form::text('lastname', $us->lastname, ['class'=>'form-control maxlength-custom-message', 'id'=>'lastnamePop2', 'name'=>'lastnamePop2', 'placeholder'=>'Ej: Peres', 'maxlength'=>'30'])}}
                        <i class="font-icon font-icon-user"></i>
                    </div>
                </fieldset>
                
<!--                 email -->
                <fieldset class="form-group">
                    <label class="form-label">Correo</label>
                    <div class="form-control-wrapper form-control-icon-left">
                        {{Form::email('email', $us->email, ['class'=>'form-control maxlength-custom-message', 'id'=>'emailPop2', 'name'=>'emailPop2', 'placeholder'=>'Ej: ejemplo@correo.com', 'maxlength'=>'25'])}}
                        <i class="font-icon font-icon-earth"></i>
                    </div>
                </fieldset>
                
<!--                 type -->
                <fieldset class="form-group">
                    <label class="form-label">Tipo</label>
                    {{Form::select('tipos',
                            App\UserType::lists('name', 'id'),
                            $us->user_type->name,
                        ['class'=>'select2 select2-hidden-accessible', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'typePop2', 'name'=>'typePop2'])}}
                </fieldset>
                
<!--                 sector -->
                <fieldset class="form-group">
                    <label class="form-label">Sector</label>
                    {{Form::select('grupos',
                            App\Sector::lists('name', 'id'),
                            $us->sector->name,
                        ['class'=>'select2 select2-hidden-accessible', 'tabindex'=>'-1', 'aria-hidden'=>'true', 'id'=>'sectorPop2', 'name'=>'sectorPop2'])}}
                </fieldset>
            </div>

<!--             buttons -->
            <div class="row">
                <fieldset class="form-group">
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-rounded btn-inline btn-primary" onclick ="createUserhide()">Cancelar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="javascript:%20check_empty2()" id="submitPop"><button type="button" class="btn btn-rounded btn-inline btn-success">Crear <i class="font-icon font-icon-check-bird"></i></button></a>
                    </div>
                </fieldset>
            </div>
        {{Form::close()}}
    </div>
<!-- Popup Div Ends Here -->
</div>
