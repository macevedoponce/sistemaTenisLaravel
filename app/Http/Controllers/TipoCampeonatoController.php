<?php

namespace App\Http\Controllers;

use App\Models\TipoCampeonato;
use Illuminate\Http\Request;

/**
 * Class TipoCampeonatoController
 * @package App\Http\Controllers
 */
class TipoCampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoCampeonatos = TipoCampeonato::paginate();

        return view('tipo-campeonato.index', compact('tipoCampeonatos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoCampeonatos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoCampeonato = new TipoCampeonato();
        return view('tipo-campeonato.create', compact('tipoCampeonato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoCampeonato::$rules);

        $tipoCampeonato = TipoCampeonato::create($request->all());

        return redirect()->route('tipo-campeonatos.index')
            ->with('success', 'TipoCampeonato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoCampeonato = TipoCampeonato::find($id);

        return view('tipo-campeonato.show', compact('tipoCampeonato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoCampeonato = TipoCampeonato::find($id);

        return view('tipo-campeonato.edit', compact('tipoCampeonato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoCampeonato $tipoCampeonato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoCampeonato $tipoCampeonato)
    {
        request()->validate(TipoCampeonato::$rules);

        $tipoCampeonato->update($request->all());

        return redirect()->route('tipo-campeonatos.index')
            ->with('success', 'TipoCampeonato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoCampeonato = TipoCampeonato::find($id)->delete();

        return redirect()->route('tipo-campeonatos.index')
            ->with('success', 'TipoCampeonato deleted successfully');
    }
}
