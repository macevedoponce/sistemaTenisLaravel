<div class="box box-info padding-1">
    <div class="box-body ">
        <div class="row">
            <div class="form-group col-md-6">
                {{ Form::label('Campeonato') }}
                {{ Form::select('campeonato_id', $campeonatos, $partido->campeonato_id, ['class' => 'form-control' . ($errors->has('campeonato_id') ? ' is-invalid' : ''), 'placeholder' => 'Campeonato Id']) }}
                {!! $errors->first('campeonato_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-6">
                {{ Form::label('Categoria') }}
                {{ Form::select('categoria_id',$categorias, $partido->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? ' is-invalid' : ''), 'placeholder' => 'Categoria Id']) }}
                {!! $errors->first('categoria_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('jugador 1') }}
            {{ Form::select('jugador1_id', $jugadores,$partido->jugador1_id, ['class' => 'form-control' . ($errors->has('jugador1_id') ? ' is-invalid' : ''), 'placeholder' => 'Jugador1 Id']) }}
            {!! $errors->first('jugador1_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('jugador 2') }}
            {{ Form::select('jugador2_id', $jugadores, $partido->jugador2_id, ['class' => 'form-control' . ($errors->has('jugador2_id') ? ' is-invalid' : ''), 'placeholder' => 'Jugador2 Id']) }}
            {!! $errors->first('jugador2_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                {{ Form::label('fecha de Partido') }}
                {{ Form::date('fechaPartido', $partido->fechaPartido, ['class' => 'form-control' . ($errors->has('fechaPartido') ? ' is-invalid' : ''), 'placeholder' => 'Fechapartido']) }}
                {!! $errors->first('fechaPartido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('hora de Partido') }}
                {{ Form::time('horaPartido', $partido->horaPartido, ['class' => 'form-control' . ($errors->has('horaPartido') ? ' is-invalid' : ''), 'placeholder' => 'Horapartido']) }}
                {!! $errors->first('horaPartido', '<div class="invalid-feedback">:message</div>') !!}
            </div>
            <div class="form-group col-md-4">
                {{ Form::label('cantidad de sets a jugar') }}
                {{ Form::select('numero_sets', [1 => '1', 2 => '2', 3 => '3', 4 => '4', 5 => '5'], $partido->numero_sets, ['class' => 'form-control' . ($errors->has('numero_sets') ? ' is-invalid' : ''), 'placeholder' => 'Numero Sets']) }}
                {!! $errors->first('numero_sets', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>


    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>


