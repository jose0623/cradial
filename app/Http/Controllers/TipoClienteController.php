<?php

namespace App\Http\Controllers;

use App\Models\TipoCliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TipoClienteRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TipoClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tipoClientes = TipoCliente::paginate();

        return view('tipo-cliente.index', compact('tipoClientes'))
            ->with('i', ($request->input('page', 1) - 1) * $tipoClientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tipoCliente = new TipoCliente();

        return view('tipo-cliente.create', compact('tipoCliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoClienteRequest $request): RedirectResponse
    {
        TipoCliente::create($request->validated());

        return Redirect::route('tipo-clientes.index')
            ->with('success', 'TipoCliente created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tipoCliente = TipoCliente::find($id);

        return view('tipo-cliente.show', compact('tipoCliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tipoCliente = TipoCliente::find($id);

        return view('tipo-cliente.edit', compact('tipoCliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoClienteRequest $request, TipoCliente $tipoCliente): RedirectResponse
    {
        $tipoCliente->update($request->validated());

        return Redirect::route('tipo-clientes.index')
            ->with('success', 'TipoCliente updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TipoCliente::find($id)->delete();

        return Redirect::route('tipo-clientes.index')
            ->with('success', 'TipoCliente deleted successfully');
    }
}
