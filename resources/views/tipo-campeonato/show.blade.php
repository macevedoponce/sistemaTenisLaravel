@extends('layouts.app')

@section('template_title')
    {{ $tipoCampeonato->name ?? "{{ __('Show') Tipo Campeonato" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipo Campeonato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipo-campeonatos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombretipocampeonato:</strong>
                            {{ $tipoCampeonato->nombreTipoCampeonato }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
