<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombrePartido') }}
            {{ Form::text('nombrePartido', $partido->nombrePartido, ['class' => 'form-control' . ($errors->has('nombrePartido') ? ' is-invalid' : ''), 'placeholder' => 'Nombrepartido']) }}
            {!! $errors->first('nombrePartido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('campeonato_id') }}
            {{ Form::select('campeonato_id', $campeonatos, $partido->campeonato_id, ['class' => 'form-control' . ($errors->has('campeonato_id') ? ' is-invalid' : ''), 'placeholder' => 'Campeonato Id']) }}
            {!! $errors->first('campeonato_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categoria_id') }}
            {{ Form::select('categoria_id', $categorias, $partido->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
            {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jugador1_id') }}
            {{ Form::select('jugador1_id',$inscritos, $partido->jugador1_id, ['class' => 'form-control' . ($errors->has('jugador1_id') ? ' is-invalid' : ''), 'placeholder' => 'Jugador1 Id']) }}
            {!! $errors->first('jugador1_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jugador2_id') }}
            {{ Form::select('jugador2_id',$inscritos, $partido->jugador2_id, ['class' => 'form-control' . ($errors->has('jugador2_id') ? ' is-invalid' : ''), 'placeholder' => 'Jugador2 Id']) }}
            {!! $errors->first('jugador2_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_partido') }}
            {{ Form::date('fecha_partido', $partido->fecha_partido, ['class' => 'form-control' . ($errors->has('fecha_partido') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Partido']) }}
            {!! $errors->first('fecha_partido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora_partido') }}
            {{ Form::time('hora_partido', $partido->hora_partido, ['class' => 'form-control' . ($errors->has('hora_partido') ? ' is-invalid' : ''), 'placeholder' => 'Hora Partido']) }}
            {!! $errors->first('hora_partido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cancha') }}
            {{ Form::number('cancha', $partido->cancha, ['class' => 'form-control' . ($errors->has('cancha') ? ' is-invalid' : ''), 'placeholder' => 'Cancha']) }}
            {!! $errors->first('cancha', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>