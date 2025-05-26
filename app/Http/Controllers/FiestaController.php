<?php

namespace App\Http\Controllers;

use App\Models\Fiesta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\FiestaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FiestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id_emisora)
    {
        // Solo pasamos el id_emisora a la vista, el componente Livewire manejará el resto
        return view('fiesta.index', compact('id_emisora'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create($id_emisora): View
    {
        $fiesta = new Fiesta();

        return view('fiesta.create', compact('fiesta', 'id_emisora'));
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(FiestaRequest $request): RedirectResponse
    {

        $id_emisora = $request->input('id_emisora');

        Fiesta::create($request->validated());

        return Redirect::route('emisora.fiestas.index', $id_emisora)
            ->with('success', 'Fiesta created successfully.');
           
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $fiesta = Fiesta::find($id);

        return view('fiesta.show', compact('fiesta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $fiesta = Fiesta::find($id);
        $id_emisora = $fiesta->id_emisora;

        return view('fiesta.edit', compact('fiesta', 'id_emisora'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(FiestaRequest $request, Fiesta $fiesta): RedirectResponse
    {
        $fiesta->update($request->validated());

        $id_emisora = $request->input('id_emisora');

        return Redirect::route('emisora.fiestas.index', $id_emisora)
            ->with('success', 'Fiesta updated successfully');
    }
   

    public function destroy($id): RedirectResponse
    {
        $fiestaRe = Fiesta::findOrFail($id);
        $id_emisora = $fiestaRe->id_emisora;

        Fiesta::find($id)->delete();

        return Redirect::route('emisora.fiestas.index', $id_emisora)
            ->with('success', 'Fiesta deleted successfully');
    }
}
