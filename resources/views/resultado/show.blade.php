@extends('layouts.app')

@section('template_title')
    {{ $resultado->name ?? "{{ __('Show') Resultado" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Resultado</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('resultados.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Partido Id:</strong>
                            {{ $resultado->partido_id }}
                        </div>
                        <div class="form-group">
                            <strong>Set Numero:</strong>
                            {{ $resultado->set_numero }}
                        </div>
                        <div class="form-group">
                            <strong>Resultado Jugador1:</strong>
                            {{ $resultado->resultado_jugador1 }}
                        </div>
                        <div class="form-group">
                            <strong>Resultado Jugador2:</strong>
                            {{ $resultado->resultado_jugador2 }}
                        </div>
                        <div class="form-group">
                            <strong>Ganador:</strong>
                            {{ $resultado->ganador }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
