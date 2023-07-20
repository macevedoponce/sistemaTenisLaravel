@extends('layouts.app')

@section('template_title')
    {{ $campeonato->name ?? "{{ __('Show') Campeonato" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Campeonato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('campeonatos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombrecampeonato:</strong>
                            {{ $campeonato->nombreCampeonato }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $campeonato->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $campeonato->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Campeonato Id:</strong>
                            {{ $campeonato->tipo_campeonato_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
