<?php

namespace App\Http\Controllers;

use App\Models\Cobertura;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CoberturaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CoberturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $coberturas = Cobertura::paginate();

        return view('cobertura.index', compact('coberturas'))
            ->with('i', ($request->input('page', 1) - 1) * $coberturas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cobertura = new Cobertura();

        return view('cobertura.create', compact('cobertura'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoberturaRequest $request): RedirectResponse
    {
        Cobertura::create($request->validated());

        return Redirect::route('coberturas.index')
            ->with('success', 'Cobertura created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cobertura = Cobertura::find($id);

        return view('cobertura.show', compact('cobertura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cobertura = Cobertura::find($id);

        return view('cobertura.edit', compact('cobertura'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CoberturaRequest $request, Cobertura $cobertura): RedirectResponse
    {
        $cobertura->update($request->validated());

        return Redirect::route('coberturas.index')
            ->with('success', 'Cobertura updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Cobertura::find($id)->delete();

        return Redirect::route('coberturas.index')
            ->with('success', 'Cobertura deleted successfully');
    }
}
