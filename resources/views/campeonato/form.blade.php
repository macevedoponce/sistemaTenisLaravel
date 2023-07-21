<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre de Campeonato') }}
            {{ Form::text('nombreCampeonato', $campeonato->nombreCampeonato, ['class' => 'form-control' . ($errors->has('nombreCampeonato') ? ' is-invalid' : ''), 'placeholder' => 'Nombre de campeonato']) }}
            {!! $errors->first('nombreCampeonato', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de Inicio') }}
            {{ Form::date('fecha_inicio', $campeonato->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('Fecha de finalización') }}
            {{ Form::date('fecha_fin', $campeonato->fecha_fin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo_campeonato_id') }}
            {{ Form::select('tipo_campeonato_id',$tipo_campeonato, $campeonato->tipo_campeonato_id, ['class' => 'form-control' . ($errors->has('tipo_campeonato_id') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Campeonato Id']) }}
            {!! $errors->first('tipo_campeonato_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>