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
                            <strong>Campeonato Id:</strong>
                            {{ $partido->campeonato->nombreCampeonato }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $partido->categoria->nombreCategoria }}
                        </div>
                        <div class="form-group">
                            <strong>Fechapartido:</strong>
                            {{ $partido->fechaPartido }}
                        </div>
                        <div class="form-group">
                            <strong>Horapartido:</strong>
                            {{ $partido->horaPartido }}
                        </div>
                        <div class="form-group">
                            <strong>Jugador1 Id:</strong>
                            {{ $partido->participante1->apellidosNombres }}
                        </div>
                        <div class="form-group">
                            <strong>Jugador2 Id:</strong>
                            {{ $partido->participante2->apellidosNombres }}
                        </div>

                        <div class="form-group">
                            <strong>Numero Sets:</strong>
                            {{ $partido->numero_sets }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
