@extends('layout')


@section('content')

<!-- This section is card -->
<section class="card">
     <div class="card-block">
        <div class="row">
            <div class="col-md-6">
                <form id="form-signin_v1" name="form-signin_v1" method="POST">
                    <fieldset class="form-group">
                        <label class="form-label">Username</label>
                            <input name="signin_v1[username]"
                            type="text"
                            class="form-control"
                            data-validation="[NOTEMPTY]">
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="form-label">Password</label>
                        <input name="signin_v1[password]"
                               type="password"
                               class="form-control"
                               data-validation="[NOTEMPTY]">
                    </fieldset>
                    <fieldset class="form-group">
                        <button type="submit" class="btn">Login</button>
                    </fieldset>
                </form>
            </div>
            <div class="col-md-6">
                <form id="form-signin_v2" name="form-signin_v2" method="POST">
                    <fieldset class="form-group">
                        <label class="form-label">Username</label>
                        <input name="signin_v2[username]"
                               type="text"
                               class="form-control"
                               data-validation="[NOTEMPTY]">
                    </fieldset>
                    <fieldset class="form-group">
                        <label class="form-label">Password</label>
                        <input name="signin_v2[password]"
                               type="password"
                               class="form-control"
                               data-validation="[NOTEMPTY]">
                    </fieldset>
                    <fieldset class="form-group">
                        <button type="submit" class="btn">Login</button>
                    </fieldset>
                </form>
            </div>
        </div><!--.row-->
    </div>
</section>

@stop