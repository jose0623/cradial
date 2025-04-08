<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReporteRequest;
use App\Models\Cliente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $reportes = Reporte::with('cliente')->paginate(25);

        return view('reporte.index', compact('reportes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $reporte = new Reporte();
        
        $clientes = Cliente::orderBy('id', 'desc')->paginate(50);
        return view('reporte.create', compact('reporte', 'clientes'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReporteRequest $request): RedirectResponse
    {
        $codigo_propuesta = 0;
        $subtotal = 0;
        $iva = 0;
        $total = 0;
        $vigencia_desde = $request->input('vigencia_desde');
        $vigencia_hasta = $request->input('vigencia_hasta');

        Reporte::create(array_merge($request->validated(),[
            'codigo_propuesta' => $codigo_propuesta,
            'subtotal' => $subtotal,
            'iva' => $iva,
            'total' => $total,
            'vigencia_desde' => $vigencia_desde,
            'vigencia_hasta' => $vigencia_hasta,
        ]));

        return Redirect::route('reportes.index')
            ->with('success', 'Reporte created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $reporte = Reporte::with('cliente')->findOrFail($id); // Use findOrFail for better error handling


        return view('reporte.show', compact('reporte'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $reporte = Reporte::find($id);
        $reporte = Reporte::with('cliente')->findOrFail($id);
        $clientes = Cliente::all(); 

        return view('reporte.edit', compact('reporte', 'clientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReporteRequest $request, Reporte $reporte): RedirectResponse
    {
        $reporte->update($request->validated());

        return Redirect::route('reportes.index')
            ->with('success', 'Reporte updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Reporte::find($id)->delete();

        return Redirect::route('reportes.index')
            ->with('success', 'Reporte deleted successfully');
    }
}
