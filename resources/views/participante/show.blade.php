@extends('adminlte::page')

@section('template_title')
    {{ $participante->name ?? "{{ __('Show') Participante" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Participante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('participantes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Dni:</strong>
                            {{ $participante->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidosnombres:</strong>
                            {{ $participante->apellidosNombres }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $participante->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Genero:</strong>
                            {{ $participante->genero->nombreGenero }}
                        </div>
                        <div class="form-group">
                            <strong>Num Celular:</strong>
                            {{ $participante->num_celular }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
