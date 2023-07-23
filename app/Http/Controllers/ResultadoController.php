<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use Illuminate\Http\Request;

/**
 * Class ResultadoController
 * @package App\Http\Controllers
 */
class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultados = Resultado::paginate();

        return view('resultado.index', compact('resultados'))
            ->with('i', (request()->input('page', 1) - 1) * $resultados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $resultado = new Resultado();
        return view('resultado.create', compact('resultado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Resultado::$rules);

        $resultado = Resultado::create($request->all());

        return redirect()->route('resultados.index')
            ->with('success', 'Resultado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resultado = Resultado::find($id);

        return view('resultado.show', compact('resultado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resultado = Resultado::find($id);

        return view('resultado.edit', compact('resultado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Resultado $resultado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resultado $resultado)
    {
        request()->validate(Resultado::$rules);

        $resultado->update($request->all());

        return redirect()->route('resultados.index')
            ->with('success', 'Resultado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $resultado = Resultado::find($id)->delete();

        return redirect()->route('resultados.index')
            ->with('success', 'Resultado deleted successfully');
    }
}
