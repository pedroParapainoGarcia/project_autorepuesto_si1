<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="name">Nombre</label>
            {!! Form::text('name', null, array('class' => 'form-control','placeholder'=>'Ingrese el nombre del usuario','autocomplete'=>'off')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="email">E-mail</label>
            {!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'Ingrese el email del usuario','autocomplete'=>'off')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="password">Password</label>
            {!! Form::password('password', array('class' => 'form-control','placeholder'=>'Ingrese la contraseña','autocomplete'=>'off')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="confirm-password">Confirmar Password</label>
            {!! Form::password('confirm-password', array('class' => 'form-control','placeholder'=>'Confirme la contraseña','autocomplete'=>'off')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="">Roles</label>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','placeholder'=>'seleccione un rol')) !!}
        </div>
    </div>   


</div>   