<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;
use App\Models\Municipio;
use App\Models\TipoCliente;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $clientes = Cliente::paginate();

        return view('cliente.index', compact('clientes'))
            ->with('i', ($request->input('page', 1) - 1) * $clientes->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $cliente = new Cliente();
        $user = User::orderBy('id', 'asc')->paginate(200);
        $municipio = Municipio::orderBy('id', 'asc')->paginate(200);
        $tipocliente = TipoCliente::orderBy('id', 'asc')->paginate(200);
        return view('cliente.create', compact('cliente','user','municipio','tipocliente'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request): RedirectResponse
    {
         // Obtener los valores de los checkboxes
         $comun = $request->input('comun') ? 1 : 0;
         $simplificado = $request->input('simplificado') ? 1 : 0;
         $gcs = $request->input('gcs') ? 1 : 0;
         $gc = $request->input('gc') ? 1 : 0;
     
         // Crear un nuevo registro de EmisoraPrograma
         Cliente::create(array_merge($request->validated(), [
             'comun' => $comun,
             'simplificado' => $simplificado,
             'gcs' => $gcs,
             'gc' => $gc,
         ]));
     
        return Redirect::route('clientes.index')
            ->with('success', 'Cliente created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $cliente = Cliente::find($id);

        return view('cliente.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $cliente = Cliente::find($id);

        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClienteRequest $request, Cliente $cliente): RedirectResponse
    {
        $cliente->update($request->validated());

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Cliente::find($id)->delete();

        return Redirect::route('clientes.index')
            ->with('success', 'Cliente deleted successfully');
    }
}
