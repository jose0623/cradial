<?php

namespace App\Http\Controllers;

use App\Models\TipoPrograma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TipoProgramaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TipoProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tipoProgramas = TipoPrograma::paginate();

        return view('tipo-programa.index', compact('tipoProgramas'))
            ->with('i', ($request->input('page', 1) - 1) * $tipoProgramas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipoPrograma = new TipoPrograma();

        return view('tipo-programa.create', compact('tipoPrograma'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoProgramaRequest $request): RedirectResponse
    {
        TipoPrograma::create($request->validated());

        return Redirect::route('tipo-programas.index')
            ->with('success', 'TipoPrograma created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tipoPrograma = TipoPrograma::find($id);

        return view('tipo-programa.show', compact('tipoPrograma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tipoPrograma = TipoPrograma::find($id);

        return view('tipo-programa.edit', compact('tipoPrograma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoProgramaRequest $request, TipoPrograma $tipoPrograma): RedirectResponse
    {
        $tipoPrograma->update($request->validated());

        return Redirect::route('tipo-programas.index')
            ->with('success', 'TipoPrograma updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TipoPrograma::find($id)->delete();

        return Redirect::route('tipo-programas.index')
            ->with('success', 'TipoPrograma deleted successfully');
    }
}
