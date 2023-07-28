@extends('adminlte::page')

@section('template_title')
    Partido
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Partido') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('partidos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombrepartido</th>
										<th>Campeonato Id</th>
										<th>Categoria Id</th>
										<th>Fecha Partido</th>
										<th>Hora Partido</th>
										<th>Cancha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($partidos as $partido)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $partido->nombrePartido }}</td>
											<td>{{ $partido->campeonato->nombreCampeonato }}</td>
											<td>{{ $partido->categoria->nombreCategoria }}</td>
											<td>{{ $partido->fecha_partido }}</td>
											<td>{{ $partido->hora_partido }}</td>
											<td>{{ $partido->cancha }}</td>

                                            <td>
                                                <form action="{{ route('partidos.destroy',$partido->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('partidos.show',$partido->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('partidos.edit',$partido->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $partidos->links() !!}
            </div>
        </div>
    </div>
@endsection
