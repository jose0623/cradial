<?php

namespace App\Http\Controllers;

use App\Models\TipoEmisora;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TipoEmisoraRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TipoEmisoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Redirige a la vista que contiene el componente Livewire
        return view('tipo-emisora.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipoEmisora = new TipoEmisora();

        return view('tipo-emisora.create', compact('tipoEmisora'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoEmisoraRequest $request): RedirectResponse
    {
        TipoEmisora::create($request->validated());

        return Redirect::route('tipo-emisoras.index')
            ->with('success', 'TipoEmisora ​​creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tipoEmisora = TipoEmisora::find($id);

        return view('tipo-emisora.show', compact('tipoEmisora'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tipoEmisora = TipoEmisora::find($id);

        return view('tipo-emisora.edit', compact('tipoEmisora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoEmisoraRequest $request, TipoEmisora $tipoEmisora): RedirectResponse
    {
        $tipoEmisora->update($request->validated());

        return Redirect::route('tipo-emisoras.index')
            ->with('success', 'TipoEmisora ​​actualizado correctamente.');
    }

    public function destroy($id): RedirectResponse
    {
        TipoEmisora::find($id)->delete();

        return Redirect::route('tipo-emisoras.index')
            ->with('success', 'TipoEmisora ​​eliminado correctamente.');
    }
}
