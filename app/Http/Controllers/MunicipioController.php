<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MunicipioRequest;
use App\Models\Estado;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MunicipioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Redirige a la vista que contiene el componente Livewire
        return view('municipio.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $municipio = new Municipio();

        $estados = Estado::orderBy('id', 'desc')->paginate();
        return view('municipio.create', compact('municipio','estados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MunicipioRequest $request): RedirectResponse
    {
        Municipio::create($request->validated());

        return Redirect::route('municipios.index')
            ->with('success', 'Municipio creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $municipio = Municipio::find($id);

        return view('municipio.show', compact('municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $municipio = Municipio::find($id);
        $estados = Estado::orderBy('id', 'asc')->paginate(50);

        return view('municipio.edit', compact('municipio','estados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MunicipioRequest $request, Municipio $municipio): RedirectResponse
    {
        $municipio->update($request->validated());

        return Redirect::route('municipios.index')
            ->with('success', 'Municipio actualizado exitosamente');
    }

    public function destroy($id): RedirectResponse
    {
        Municipio::find($id)->delete();

        return Redirect::route('municipios.index')
            ->with('success', 'Municipio eliminado exitosamente');
    }
}
