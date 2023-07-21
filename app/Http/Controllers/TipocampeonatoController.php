<?php

namespace App\Http\Controllers;

use App\Models\Tipocampeonato;
use Illuminate\Http\Request;

/**
 * Class TipocampeonatoController
 * @package App\Http\Controllers
 */
class TipocampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipocampeonatos = Tipocampeonato::paginate();

        return view('tipocampeonato.index', compact('tipocampeonatos'))
            ->with('i', (request()->input('page', 1) - 1) * $tipocampeonatos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipocampeonato = new Tipocampeonato();
        return view('tipocampeonato.create', compact('tipocampeonato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Tipocampeonato::$rules);

        $tipocampeonato = Tipocampeonato::create($request->all());

        return redirect()->route('tipocampeonatos.index')
            ->with('success', 'Tipocampeonato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipocampeonato = Tipocampeonato::find($id);

        return view('tipocampeonato.show', compact('tipocampeonato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipocampeonato = Tipocampeonato::find($id);

        return view('tipocampeonato.edit', compact('tipocampeonato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tipocampeonato $tipocampeonato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tipocampeonato $tipocampeonato)
    {
        request()->validate(Tipocampeonato::$rules);

        $tipocampeonato->update($request->all());

        return redirect()->route('tipocampeonatos.index')
            ->with('success', 'Tipocampeonato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipocampeonato = Tipocampeonato::find($id)->delete();

        return redirect()->route('tipocampeonatos.index')
            ->with('success', 'Tipocampeonato deleted successfully');
    }
}
