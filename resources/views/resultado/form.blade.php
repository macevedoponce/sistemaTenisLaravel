<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('partido_id') }}
            {{ Form::text('partido_id', $resultado->partido_id, ['class' => 'form-control' . ($errors->has('partido_id') ? ' is-invalid' : ''), 'placeholder' => 'Partido Id']) }}
            {!! $errors->first('partido_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ganador_id') }}
            {{ Form::text('ganador_id', $resultado->ganador_id, ['class' => 'form-control' . ($errors->has('ganador_id') ? ' is-invalid' : ''), 'placeholder' => 'Ganador Id']) }}
            {!! $errors->first('ganador_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('perdedor_id') }}
            {{ Form::text('perdedor_id', $resultado->perdedor_id, ['class' => 'form-control' . ($errors->has('perdedor_id') ? ' is-invalid' : ''), 'placeholder' => 'Perdedor Id']) }}
            {!! $errors->first('perdedor_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>