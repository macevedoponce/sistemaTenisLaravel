@extends('adminlte::page')

@section('template_title')
    Campeonato
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Campeonato') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('campeonatos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nombrecampeonato</th>
										<th>Fecha Inicio</th>
										<th>Fecha Fin</th>
										<th>Tipo Campeonato Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($campeonatos as $campeonato)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $campeonato->nombreCampeonato }}</td>
											<td>{{ $campeonato->fecha_inicio }}</td>
											<td>{{ $campeonato->fecha_fin }}</td>
											<td>{{ $campeonato->tipocampeonato->nombreTipoCampeonato }}</td>

                                            <td>
                                                <form action="{{ route('campeonatos.destroy',$campeonato->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('campeonatos.show',$campeonato->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('campeonatos.edit',$campeonato->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $campeonatos->links() !!}
            </div>
        </div>
    </div>
@endsection
