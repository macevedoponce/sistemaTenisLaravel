@extends('adminlte::page')

@section('template_title')
    Inscrito
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inscrito') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('inscritos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre Equipo</th>
										<th>Campeonato Id</th>
										<th>Categoria Id</th>
										<th>Jugador1 Id</th>
										<th>Jugador2 Id</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscritos as $inscrito)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $inscrito->nombre_equipo }}</td>
											<td>{{ $inscrito->campeonato->nombreCampeonato }}</td>
											<td>{{ $inscrito->categoria->nombreCategoria }}</td>
											<td>{{ $inscrito->participante1->apellidos_nombres }}</td>
											<td>{{ $inscrito->participante2->apellidos_nombres ?? '' }}</td>

                                            <td>
                                                <form action="{{ route('inscritos.destroy',$inscrito->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inscritos.show',$inscrito->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('inscritos.edit',$inscrito->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $inscritos->links() !!}
            </div>
        </div>
    </div>
@endsection
