<?php

namespace App\Http\Controllers;

use App\Models\TipoAfiliacione;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TipoAfiliacioneRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TipoAfiliacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Redirige a la vista que contiene el componente Livewire
        return view('tipo-afiliacione.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipoAfiliacione = new TipoAfiliacione();

        return view('tipo-afiliacione.create', compact('tipoAfiliacione'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoAfiliacioneRequest $request): RedirectResponse
    {
        TipoAfiliacione::create($request->validated());

        return Redirect::route('tipo-afiliaciones.index')
            ->with('success', 'Afiliación creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tipoAfiliacione = TipoAfiliacione::find($id);

        return view('tipo-afiliacione.show', compact('tipoAfiliacione'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tipoAfiliacione = TipoAfiliacione::find($id);

        return view('tipo-afiliacione.edit', compact('tipoAfiliacione'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoAfiliacioneRequest $request, TipoAfiliacione $tipoAfiliacione): RedirectResponse
    {
        $tipoAfiliacione->update($request->validated());

        return Redirect::route('tipo-afiliaciones.index')
            ->with('success', 'Afiliación actualizada con exito');
    }

    public function destroy($id): RedirectResponse
    {
        TipoAfiliacione::find($id)->delete();

        return Redirect::route('tipo-afiliaciones.index')
            ->with('success', 'Afiliación Eliminada con exito');
    }
}
