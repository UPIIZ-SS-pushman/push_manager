@yield('popups')

<link href="template/css/popup.css" rel="stylesheet">
<script src="template/js/popup.js"></script>

<!-- confirm popup user -->
<div id="abc3">
    <div id="popupContact3">
        <form action="#" id="formPop3" method="post" name="formPop3" class="box-typical">
            <h2 class="m-t-lg with-border m-t-0">¿Désea eliminar el registro?</h2>
            
            <!--             buttons -->
            <div class="row">
                <fieldset class="form-group">
                    <div class="col-lg-6">
                        <a href="javascript:%20deleteReg()" id="submitPop"><button type="button" class="btn btn-rounded btn-inline btn-danger-outline">Eliminar</button></a>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-rounded btn-inline btn-primary-outline" onclick ="div_hide3()">Cancelar</button>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</div>

<!-- confirm popup user -->
<div id="abc2">
    <div id="popupContact2">
        <form action="#" id="formPop2" method="post" name="formPop2" class="box-typical">
            <h2 class="m-t-lg with-border m-t-0">¿Désea eliminar los registros?</h2>
            
            <!--             buttons -->
            <div class="row">
                <fieldset class="form-group">
                    <div class="col-lg-6">
                        <a href="javascript:%20deleteRegAll()" id="submitPop"><button type="button" class="btn btn-rounded btn-inline btn-danger-outline">Eliminar</button></a>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-rounded btn-inline btn-primary-outline" onclick ="div_hide2()">Cancelar</button>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</div>

<!-- contact popup user              -->
<div id="abc">
<!-- Popup Div Starts Here -->
    <div id="popupContact">
    <!-- Contact Us Form -->
        <form action="#" id="formPop" method="post" name="formPop" class="box-typical">
            <h2 class="m-t-lg with-border m-t-0">Edición de campos</h2>

            <div class="row">
<!--                 user -->
                <fieldset class="form-group">
                    <label class="form-label">Usuario</label>
                    <div class="form-control-wrapper form-control-icon-left">
                        {{Form::text('user', $us->username, ['class'=>'form-control', 'id'=>'userPop', 'name'=>'userPop', 'placeholder'=>'Ej: pepe1'])}}
                        <i class="font-icon font-icon-user"></i>
                    </div>
                </fieldset>

                <fieldset class="form-group">
                    <label class="form-label">Nombre(s)</label>
                    <div class="form-control-wrapper form-control-icon-left">
                        {{Form::text('name', $us->name, ['class'=>'form-control', 'id'=>'namePop', 'name'=>'namePop', 'placeholder'=>'Ej: pedro'])}}
                        <i class="font-icon font-icon-user"></i>
                    </div>
                </fieldset>
                
                <fieldset class="form-group">
                    <label class="form-label">Apellidos</label>
                    <div class="form-control-wrapper form-control-icon-left">
                        {{Form::text('lastname', $us->lastname, ['class'=>'form-control', 'id'=>'lastnamePop', 'name'=>'lastnamePop', 'placeholder'=>'Ej: Peres'])}}
                        <i class="font-icon font-icon-user"></i>
                    </div>
                </fieldset>
                
<!--                 email -->
                <fieldset class="form-group">
                    <label class="form-label">Correo</label>
                    <div class="form-control-wrapper form-control-icon-left">
                        {{Form::email('email', $us->email, ['class'=>'form-control', 'id'=>'emailPop', 'name'=>'emailPop', 'placeholder'=>'Ej: ejemplo@correo.com'])}}
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
                        <a href="javascript:%20check_empty()" id="submitPop"><button type="button" class="btn btn-rounded btn-inline btn-warning-outline">Actualizar</button></a>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" class="btn btn-rounded btn-inline btn-primary-outline" onclick ="div_hide()">Cancelar</button>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
<!-- Popup Div Ends Here -->
</div>
