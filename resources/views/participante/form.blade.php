<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('dni') }}
            {{ Form::text('dni', $participante->dni, ['class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''), 'placeholder' => 'documento nacional de identidad']) }}
            {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Apellidos y Nombres') }}
            {{ Form::text('apellidosNombres', $participante->apellidosNombres, ['class' => 'form-control' . ($errors->has('apellidosNombres') ? ' is-invalid' : ''), 'placeholder' => 'apellidos y nombres']) }}
            {!! $errors->first('apellidosNombres', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha de nacimiento') }}
            {{ Form::date('fecha_nacimiento', $participante->fecha_nacimiento, ['class' => 'form-control' . ($errors->has('fecha_nacimiento') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Nacimiento']) }}
            {!! $errors->first('fecha_nacimiento', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Genero') }}
            {{ Form::select('genero_id',$generos, $participante->genero_id, ['class' => 'form-control' . ($errors->has('genero_id') ? ' is-invalid' : ''), 'placeholder' => 'Genero Id']) }}
            {!! $errors->first('genero_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('num_celular') }}
            {{ Form::text('num_celular', $participante->num_celular, ['class' => 'form-control' . ($errors->has('num_celular') ? ' is-invalid' : ''), 'placeholder' => 'Num Celular']) }}
            {!! $errors->first('num_celular', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>