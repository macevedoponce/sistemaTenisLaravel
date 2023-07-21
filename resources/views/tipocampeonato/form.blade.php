<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombreTipoCampeonato') }}
            {{ Form::text('nombreTipoCampeonato', $tipocampeonato->nombreTipoCampeonato, ['class' => 'form-control' . ($errors->has('nombreTipoCampeonato') ? ' is-invalid' : ''), 'placeholder' => 'Nombretipocampeonato']) }}
            {!! $errors->first('nombreTipoCampeonato', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>