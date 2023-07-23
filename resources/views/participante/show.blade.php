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
                            <strong>Apellidos Nombres:</strong>
                            {{ $participante->apellidos_nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Nacimiento:</strong>
                            {{ $participante->fecha_nacimiento }}
                        </div>
                        <div class="form-group">
                            <strong>Celular:</strong>
                            {{ $participante->celular }}
                        </div>
                        <div class="form-group">
                            <strong>Genero Id:</strong>
                            {{ $participante->genero_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
