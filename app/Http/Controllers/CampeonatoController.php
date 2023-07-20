<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use Illuminate\Http\Request;

/**
 * Class CampeonatoController
 * @package App\Http\Controllers
 */
class CampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campeonatos = Campeonato::paginate();

        return view('campeonato.index', compact('campeonatos'))
            ->with('i', (request()->input('page', 1) - 1) * $campeonatos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campeonato = new Campeonato();
        return view('campeonato.create', compact('campeonato'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Campeonato::$rules);

        $campeonato = Campeonato::create($request->all());

        return redirect()->route('campeonatos.index')
            ->with('success', 'Campeonato created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campeonato = Campeonato::find($id);

        return view('campeonato.show', compact('campeonato'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campeonato = Campeonato::find($id);

        return view('campeonato.edit', compact('campeonato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Campeonato $campeonato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campeonato $campeonato)
    {
        request()->validate(Campeonato::$rules);

        $campeonato->update($request->all());

        return redirect()->route('campeonatos.index')
            ->with('success', 'Campeonato updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $campeonato = Campeonato::find($id)->delete();

        return redirect()->route('campeonatos.index')
            ->with('success', 'Campeonato deleted successfully');
    }
}
