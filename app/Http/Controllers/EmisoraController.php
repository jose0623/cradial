<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmisoraRequest;
use App\Models\TipoAfiliacione;
use App\Models\TipoEmisora;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmisoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $emisoras = Emisora::paginate();

        return view('emisora.index', compact('emisoras'))
            ->with('i', ($request->input('page', 1) - 1) * $emisoras->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $emisora = new Emisora();

        $tipoEmisora = TipoEmisora::orderBy('id', 'desc')->paginate(50);
        $tipoAfiliacione = TipoAfiliacione::orderBy('id', 'asc')->paginate(200);
        return view('emisora.create', compact('emisora', 'tipoEmisora', 'tipoAfiliacione' ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmisoraRequest $request): RedirectResponse
    {   
        //return $request->all();
        Emisora::create($request->validated());

        return Redirect::route('emisoras.index')
            ->with('success', 'Emisora created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $emisora = Emisora::find($id);

        return view('emisora.show', compact('emisora'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $emisora = Emisora::find($id);
        $tipoEmisora = TipoEmisora::orderBy('id', 'desc')->paginate(50);
        $tipoAfiliacione = TipoAfiliacione::orderBy('id', 'asc')->paginate(200);

        return view('emisora.edit', compact('emisora', 'tipoEmisora', 'tipoAfiliacione' ));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmisoraRequest $request, Emisora $emisora): RedirectResponse
    {
        $emisora->update($request->validated());

        return Redirect::route('emisoras.index')
            ->with('success', 'Emisora updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Emisora::find($id)->delete();

        return Redirect::route('emisoras.index')
            ->with('success', 'Emisora deleted successfully');
    }
}
