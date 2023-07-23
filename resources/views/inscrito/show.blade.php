@extends('adminlte::page')

@section('template_title')
    {{ $inscrito->name ?? "{{ __('Show') Inscrito" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Inscrito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inscritos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Equipo:</strong>
                            {{ $inscrito->nombre_equipo ?? 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Campeonato Id:</strong>
                            {{ $inscrito->campeonato ? $inscrito->campeonato->nombreCampeonato : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $inscrito->categoria ? $inscrito->categoria->nombreCategoria : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Jugador1 Id:</strong>
                            {{ $inscrito->Participante1 ? $inscrito->Participante1->apellidos_nombres : 'N/A' }}
                        </div>
                        <div class="form-group">
                            <strong>Jugador2 Id:</strong>
                            {{ $inscrito->Participante2 ? $inscrito->Participante2->apellidos_nombres : 'N/A' }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
