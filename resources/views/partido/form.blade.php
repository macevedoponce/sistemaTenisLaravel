<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('campeonato_id') }}
            {{ Form::text('campeonato_id', $partido->campeonato_id, ['class' => 'form-control' . ($errors->has('campeonato_id') ? ' is-invalid' : ''), 'placeholder' => 'Campeonato Id']) }}
            {!! $errors->first('campeonato_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            {{ Form::text('categoria_id', $partido->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fechaPartido') }}
            {{ Form::text('fechaPartido', $partido->fechaPartido, ['class' => 'form-control' . ($errors->has('fechaPartido') ? ' is-invalid' : ''), 'placeholder' => 'Fechapartido']) }}
            {!! $errors->first('fechaPartido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('horaPartido') }}
            {{ Form::text('horaPartido', $partido->horaPartido, ['class' => 'form-control' . ($errors->has('horaPartido') ? ' is-invalid' : ''), 'placeholder' => 'Horapartido']) }}
            {!! $errors->first('horaPartido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jugador1_id') }}
            {{ Form::text('jugador1_id', $partido->jugador1_id, ['class' => 'form-control' . ($errors->has('jugador1_id') ? ' is-invalid' : ''), 'placeholder' => 'Jugador1 Id']) }}
            {!! $errors->first('jugador1_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jugador2_id') }}
            {{ Form::text('jugador2_id', $partido->jugador2_id, ['class' => 'form-control' . ($errors->has('jugador2_id') ? ' is-invalid' : ''), 'placeholder' => 'Jugador2 Id']) }}
            {!! $errors->first('jugador2_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero_sets') }}
            {{ Form::text('numero_sets', $partido->numero_sets, ['class' => 'form-control' . ($errors->has('numero_sets') ? ' is-invalid' : ''), 'placeholder' => 'Numero Sets']) }}
            {!! $errors->first('numero_sets', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>