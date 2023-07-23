<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use App\Models\Categoria;
use App\Models\Inscrito;
use App\Models\Participante;
use Illuminate\Http\Request;

/**
 * Class InscritoController
 * @package App\Http\Controllers
 */
class InscritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscritos = Inscrito::paginate();

        return view('inscrito.index', compact('inscritos'))
            ->with('i', (request()->input('page', 1) - 1) * $inscritos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inscrito = new Inscrito();
        $campeonatos = Campeonato::pluck('nombreCampeonato','id'); 
        $categorias = Categoria::pluck('nombreCategoria','id');
        $participantes = Participante::pluck('apellidos_nombres','id');
        return view('inscrito.create', compact('inscrito','campeonatos','categorias','participantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Inscrito::$rules);

        $inscrito = Inscrito::create($request->all());

        return redirect()->route('inscritos.index')
            ->with('success', 'Inscrito created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inscrito = Inscrito::find($id);

        return view('inscrito.show', compact('inscrito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inscrito = Inscrito::find($id);
        $campeonatos = Campeonato::pluck('nombreCampeonato','id'); 
        $categorias = Categoria::pluck('nombreCategoria','id');
        $participantes = Participante::pluck('apellidos_nombres','id');
        return view('inscrito.edit', compact('inscrito','campeonatos','categorias','participantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Inscrito $inscrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscrito $inscrito)
    {
        request()->validate(Inscrito::$rules);

        $inscrito->update($request->all());

        return redirect()->route('inscritos.index')
            ->with('success', 'Inscrito updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inscrito = Inscrito::find($id)->delete();

        return redirect()->route('inscritos.index')
            ->with('success', 'Inscrito deleted successfully');
    }
}
