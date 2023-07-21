@extends('adminlte::page')

@section('template_title')
    {{ $tipocampeonato->name ?? "{{ __('Show') Tipocampeonato" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tipocampeonato</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tipocampeonatos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombretipocampeonato:</strong>
                            {{ $tipocampeonato->nombreTipoCampeonato }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
