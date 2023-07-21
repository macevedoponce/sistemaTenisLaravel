<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('partido_id') }}
            {{ Form::select('partido_id', $partidos, $resultado->partido_id, ['class' => 'form-control' . ($errors->has('partido_id') ? ' is-invalid' : ''), 'placeholder' => 'Partido Id']) }}
            {!! $errors->first('partido_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('set_numero') }}
            {{ Form::text('set_numero', $resultado->set_numero, ['class' => 'form-control' . ($errors->has('set_numero') ? ' is-invalid' : ''), 'placeholder' => 'Set Numero']) }}
            {!! $errors->first('set_numero', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resultado_jugador1') }}
            {{ Form::text('resultado_jugador1', $resultado->resultado_jugador1, ['class' => 'form-control' . ($errors->has('resultado_jugador1') ? ' is-invalid' : ''), 'placeholder' => 'Resultado Jugador1']) }}
            {!! $errors->first('resultado_jugador1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('resultado_jugador2') }}
            {{ Form::text('resultado_jugador2', $resultado->resultado_jugador2, ['class' => 'form-control' . ($errors->has('resultado_jugador2') ? ' is-invalid' : ''), 'placeholder' => 'Resultado Jugador2']) }}
            {!! $errors->first('resultado_jugador2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ganador') }}
            {{ Form::text('ganador', $resultado->ganador, ['class' => 'form-control' . ($errors->has('ganador') ? ' is-invalid' : ''), 'placeholder' => 'Ganador']) }}
            {!! $errors->first('ganador', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>