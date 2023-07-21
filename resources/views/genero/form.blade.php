<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombreGenero') }}
            {{ Form::text('nombreGenero', $genero->nombreGenero, ['class' => 'form-control' . ($errors->has('nombreGenero') ? ' is-invalid' : ''), 'placeholder' => 'Nombregenero']) }}
            {!! $errors->first('nombreGenero', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>