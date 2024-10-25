<?php

namespace App\Http\Controllers;

use App\Models\EmisoraPrograma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\EmisoraProgramaRequest;
use App\Models\TipoPrograma;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class EmisoraProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id_emisora): View
    {
        $emisoraProgramas = EmisoraPrograma::where('id_emisora', $id_emisora)->paginate();

        return view('emisora-programa.index', compact('emisoraProgramas', 'id_emisora'))
            ->with('i', ($request->input('page', 1) - 1) * $emisoraProgramas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id_emisora): View
    {   
        $emisoraPrograma = new EmisoraPrograma();
        $tipoPrograma =  TipoPrograma::orderBy('id', 'asc')->paginate(200);
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
        $lunes = $request->input('lunes') ? 1 : 0;
        $martes = $request->input('martes') ? 1 : 0;
        $miercoles = $request->input('miercoles') ? 1 : 0;
        $jueves = $request->input('jueves') ? 1 : 0;
        $viernes = $request->input('viernes') ? 1 : 0;
        $sabado = $request->input('sabado') ? 1 : 0;
        $domingo = $request->input('domingo') ? 1 : 0;
    
        // Crear un nuevo registro de EmisoraPrograma
        EmisoraPrograma::create(array_merge($request->validated(), [
            'id_emisora' => $id_emisora,
            'lunes' => $lunes,
            'martes' => $martes,
            'miercoles' => $miercoles,
            'jueves' => $jueves,
            'viernes' => $viernes,
            'sabado' => $sabado,
            'domingo' => $domingo,
        ]));
    
        // Redirigir a la lista de programas de la emisora
        return Redirect::route('emisora.programas.index', $id_emisora)
        ->with('success', 'EmisoraPrograma created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $emisoraPrograma = EmisoraPrograma::findOrFail($id);

        return view('emisora-programa.show', compact('emisoraPrograma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $emisoraPrograma = EmisoraPrograma::findOrFail($id);

        // Accede al atributo id_emisora del modelo
        $id_emisora = $emisoraPrograma->id_emisora;

        $emisoraPrograma = EmisoraPrograma::findOrFail($id);
        $tipoPrograma =  TipoPrograma::orderBy('id', 'asc')->paginate(200);

        return view('emisora-programa.edit', compact('emisoraPrograma','tipoPrograma', 'id_emisora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmisoraProgramaRequest $request, EmisoraPrograma $emisoraPrograma): RedirectResponse
    {

         // Obtener los valores de los checkboxes
        $lunes = $request->input('lunes') ? 1 : 0;
        $martes = $request->input('martes') ? 1 : 0;
        $miercoles = $request->input('miercoles') ? 1 : 0;
        $jueves = $request->input('jueves') ? 1 : 0;
        $viernes = $request->input('viernes') ? 1 : 0;
        $sabado = $request->input('sabado') ? 1 : 0;
        $domingo = $request->input('domingo') ? 1 : 0;

         // Actualizar el registro de EmisoraPrograma
        $emisoraPrograma->update(array_merge($request->validated(), [
            'lunes' => $lunes,
            'martes' => $martes,
            'miercoles' => $miercoles,
            'jueves' => $jueves,
            'viernes' => $viernes,
            'sabado' => $sabado,
            'domingo' => $domingo,
        ]));
        
        $id_emisora = $request->input('id_emisora');

      
        // Redirigir a la lista de programas de la emisora
        return Redirect::route('emisora.programas.index', $id_emisora)
        ->with('success', 'EmisoraPrograma updated successfully.');
    }

    public function destroy($id): RedirectResponse
    {
        $emisoraPrograma = EmisoraPrograma::findOrFail($id);
        $id_emisora = $emisoraPrograma->id_emisora;

        EmisoraPrograma::findOrFail($id)->delete();

        return Redirect::route('emisora.programas.index', $id_emisora)
            ->with('success', 'EmisoraPrograma deleted successfully');
    }
}