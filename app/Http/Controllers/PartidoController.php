<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use App\Models\Categoria;
use App\Models\Inscrito;
use App\Models\Partido;
use Illuminate\Http\Request;

/**
 * Class PartidoController
 * @package App\Http\Controllers
 */
class PartidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partidos = Partido::paginate();

        return view('partido.index', compact('partidos'))
            ->with('i', (request()->input('page', 1) - 1) * $partidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partido = new Partido();
        $campeonatos = Campeonato::pluck('nombreCampeonato','id');
        $categorias = Categoria::pluck('nombreCategoria','id');
        $inscritos = Inscrito::pluck('nombre_equipo','id');
        return view('partido.create', compact('partido','campeonatos','categorias','inscritos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Partido::$rules);

        $partido = Partido::create($request->all());

        return redirect()->route('partidos.index')
            ->with('success', 'Partido created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $partido = Partido::find($id);

        return view('partido.show', compact('partido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $partido = Partido::find($id);
        $campeonatos = Campeonato::pluck('nombreCampeonato','id');
        $categorias = Categoria::pluck('nombreCategoria','id');
        $inscritos = Inscrito::pluck('nombre_equipo','id');
        return view('partido.edit', compact('partido','campeonatos','categorias','inscritos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Partido $partido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Partido $partido)
    {
        request()->validate(Partido::$rules);

        $partido->update($request->all());

        return redirect()->route('partidos.index')
            ->with('success', 'Partido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $partido = Partido::find($id)->delete();

        return redirect()->route('partidos.index')
            ->with('success', 'Partido deleted successfully');
    }

    public function getPlayers(Request $request)
    {
        $campeonatoId = $request->input('campeonato_id');
        $categoriaId = $request->input('categoria_id');

        $inscritos = Inscrito::where('campeonato_id', $campeonatoId)
            ->where('categoria_id', $categoriaId)
            ->pluck('nombre_equipo', 'id')
            ->toArray();

        return response()->json($inscritos);
    }
}
