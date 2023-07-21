<?php

namespace App\Http\Controllers;

use App\Models\Participante;
use App\Models\Genero;
use Illuminate\Http\Request;

/**
 * Class ParticipanteController
 * @package App\Http\Controllers
 */
class ParticipanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $participantes = Participante::paginate();

        return view('participante.index', compact('participantes'))
            ->with('i', (request()->input('page', 1) - 1) * $participantes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $participante = new Participante();
        $generos = Genero::pluck('nombreGenero','id');
        return view('participante.create', compact('participante','generos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Participante::$rules);

        $participante = Participante::create($request->all());

        return redirect()->route('participantes.index')
            ->with('success', 'Participante created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $participante = Participante::find($id);

        return view('participante.show', compact('participante'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $participante = Participante::find($id);
        $generos = Genero::pluck('nombreGenero','id');
        return view('participante.edit', compact('participante','generos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Participante $participante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participante $participante)
    {
        request()->validate(Participante::$rules);

        $participante->update($request->all());

        return redirect()->route('participantes.index')
            ->with('success', 'Participante updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $participante = Participante::find($id)->delete();

        return redirect()->route('participantes.index')
            ->with('success', 'Participante deleted successfully');
    }
}
