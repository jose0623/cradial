<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EstadoRequest;
use App\Models\Paise;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EstadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Solo redirige a la vista que contiene el componente Livewire
        return view('estado.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $estado = new Estado();

        $paises = Paise::orderBy('id', 'desc')->paginate();
        return view('estado.create', compact('estado', 'paises'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstadoRequest $request): RedirectResponse
    {
        Estado::create($request->validated());

        return Redirect::route('estados.index')
            ->with('success', 'Departamento creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $estado = Estado::find($id);

        return view('estado.show', compact('estado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $estado = Estado::find($id);
        $paises = Paise::orderBy('id', 'desc')->paginate();

        return view('estado.edit', compact('estado','paises'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstadoRequest $request, Estado $estado): RedirectResponse
    {
        $estado->update($request->validated());

        return Redirect::route('estados.index')
            ->with('success', 'Departamento actualizado exitosamente');
    }

    public function destroy($id): RedirectResponse
    {
        Estado::find($id)->delete();

        return Redirect::route('estados.index')
            ->with('success', 'Departamento eliminado exitosamente');
    }
}
