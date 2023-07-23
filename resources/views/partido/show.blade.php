@extends('adminlte::page')

@section('template_title')
    {{ $partido->name ?? "{{ __('Show') Partido" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Partido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('partidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombrepartido:</strong>
                            {{ $partido->nombrePartido }}
                        </div>
                        <div class="form-group">
                            <strong>Campeonato Id:</strong>
                            {{ $partido->campeonato_id }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $partido->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Jugador1 Id:</strong>
                            {{ $partido->jugador1_id }}
                        </div>
                        <div class="form-group">
                            <strong>Jugador2 Id:</strong>
                            {{ $partido->jugador2_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Partido:</strong>
                            {{ $partido->fecha_partido }}
                        </div>
                        <div class="form-group">
                            <strong>Hora Partido:</strong>
                            {{ $partido->hora_partido }}
                        </div>
                        <div class="form-group">
                            <strong>Cancha:</strong>
                            {{ $partido->cancha }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
