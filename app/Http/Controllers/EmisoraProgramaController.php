<?php

namespace App\Http\Controllers;

use App\Models\CostoPrograma;
use App\Models\EmisoraPrograma;
use App\Http\Requests\EmisoraProgramaRequest;
use App\Models\Emisora;
use App\Models\TipoPrograma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;

class EmisoraProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id_emisora): View
    {
        
    
        // Opción 2: Si estás usando Livewire (recomendado)
        //return view('emisora-programa.index', ['id_emisora' => $id_emisora]);

        $emisora = Emisora::where('id', $id_emisora)->first();
        return view('emisora-programa.index', compact('emisora', 'id_emisora'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_emisora): View
    {
        $emisoraPrograma = new EmisoraPrograma();
        $tipoPrograma = TipoPrograma::orderBy('id', 'asc')->paginate(200);
        return view('emisora-programa.create', compact('emisoraPrograma', 'id_emisora', 'tipoPrograma'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(EmisoraProgramaRequest $request): RedirectResponse
    {
        // Obtener el valor de id_emisora del request
        $id_emisora = $request->input('id_emisora');

        // Obtener los valores de los checkboxes
        $dias = [
            'lunes' => $request->input('lunes') ? 1 : 0,
            'martes' => $request->input('martes') ? 1 : 0,
            'miercoles' => $request->input('miercoles') ? 1 : 0,
            'jueves' => $request->input('jueves') ? 1 : 0,
            'viernes' => $request->input('viernes') ? 1 : 0,
            'sabado' => $request->input('sabado') ? 1 : 0,
            'domingo' => $request->input('domingo') ? 1 : 0,
        ];

        // Crear un nuevo registro de EmisoraPrograma
        $emisoraPrograma = EmisoraPrograma::create(array_merge($request->validated(), [
            'id_emisora' => $id_emisora,
        ] + $dias));

        // Guardar el costo inicial en la tabla costos_programas
        CostoPrograma::create([
            'id_programa' => $emisoraPrograma->id, // Usamos el ID del EmisoraPrograma creado
            'costo' => $request->input('costo'),
            'venta' => $request->input('venta'),
            'fecha' => Carbon::now()->toDateString(),
        ]);

        // Redirigir a la lista de programas de la emisora
        return Redirect::route('emisora.programas.index', $id_emisora)
            ->with('success', 'Programa creado con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $emisoraPrograma = EmisoraPrograma::findOrFail($id);
    
        // Obtener los últimos 10 costos históricos del programa
        $historialCostos = CostoPrograma::where('id_programa', $emisoraPrograma->id)
            ->orderBy('fecha', 'desc')
            ->take(10)
            ->get();
    
        return view('emisora-programa.show', compact('emisoraPrograma', 'historialCostos'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $emisoraPrograma = EmisoraPrograma::findOrFail($id);
        $id_emisora = $emisoraPrograma->id_emisora;
        $tipoPrograma = TipoPrograma::orderBy('id', 'asc')->paginate(200);

        return view('emisora-programa.edit', compact('emisoraPrograma', 'tipoPrograma', 'id_emisora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmisoraProgramaRequest $request, EmisoraPrograma $emisoraPrograma): RedirectResponse
    {
        // Obtener los valores de los checkboxes
        $dias = [
            'lunes' => $request->input('lunes') ? 1 : 0,
            'martes' => $request->input('martes') ? 1 : 0,
            'miercoles' => $request->input('miercoles') ? 1 : 0,
            'jueves' => $request->input('jueves') ? 1 : 0,
            'viernes' => $request->input('viernes') ? 1 : 0,
            'sabado' => $request->input('sabado') ? 1 : 0,
            'domingo' => $request->input('domingo') ? 1 : 0,
        ];

        // Verificar si el costo ha cambiado
        if ($request->input('costo') != $emisoraPrograma->costo) {
            // Crear un nuevo registro en costos_programas con el nuevo costo
            CostoPrograma::create([
                'id_programa' => $emisoraPrograma->id, // Usamos el ID del EmisoraPrograma actualizado
                'costo' => $request->input('costo'),
                'venta' => $request->input('venta'),
                'fecha' => Carbon::now()->toDateString(),
            ]);
        }

        // Actualizar el registro de EmisoraPrograma
        $emisoraPrograma->update(array_merge($request->validated(), $dias));

        $id_emisora = $request->input('id_emisora');

        // Redirigir a la lista de programas de la emisora
        return Redirect::route('emisora.programas.index', $id_emisora)
            ->with('success', 'Programa actualizado exitosamente.');
    }

    public function destroy($id): RedirectResponse
    {
        $emisoraPrograma = EmisoraPrograma::findOrFail($id);
        $id_programa = $emisoraPrograma->id; // Usamos el ID del EmisoraPrograma a eliminar
        $id_emisora = $emisoraPrograma->id_emisora;

        // Eliminar todos los costos asociados al programa eliminado
        CostoPrograma::where('id_programa', $id_programa)->delete();

        $emisoraPrograma->delete();

        return Redirect::route('emisora.programas.index', $id_emisora)
            ->with('success', 'Programa eliminado exitosamente');
    }
}