<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="name">Nombre</label>
            {!! Form::text('name', null, array('class' => 'form-control','placeholder'=>'Ingrese el nombre del usuario','autocomplete'=>'off')) !!}

            @error('name')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="email">E-mail</label>
            {!! Form::text('email', null, array('class' => 'form-control','placeholder'=>'Ingrese el email del usuario','autocomplete'=>'off')) !!}

            @error('email')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="password">Password</label>
            {!! Form::password('password', array('class' => 'form-control','placeholder'=>'Ingrese la contraseña')) !!}

            @error('password')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="confirm-password">Confirmar Password</label>
            {!! Form::password('confirm-password', array('class' => 'form-control','placeholder'=>'Confirme la contraseña')) !!}

            @error('password')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6">
        <div class="form-group">
            <label for="">Roles</label>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control'))!!}
            
            @error('roles[]')
            <small class="text-danger">
                {{$message}}
            </small>
            @enderror
        </div>
    </div>


</div>