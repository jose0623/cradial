<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use App\Models\EmisoraPrograma;
use App\Models\Fiesta;
use App\Models\Regiones;
use App\Models\TipoAfiliacione;
use App\Models\TipoEmisora;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmisoraExport; // Creamos esta clase en el siguiente paso
use Barryvdh\DomPDF\Facade\Pdf; // Si usas DomPDF
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\EmisoraRequest;

class EmisoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$this->authorize('access-admin-section');

        return view('emisora.index');
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
            ->with('success', 'Emisora ​​creada con éxito.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        // Obtiene la emisora por su ID, lanza una excepción si no existe.
        $emisora = Emisora::findOrFail($id);
    
        // Obtiene las coberturas de la emisora, incluyendo el municipio y el estado del municipio.
        $coberturas = Regiones::where('id_emisora', $id)
            ->orderBy('id', 'desc')
            ->with(['municipio.estado']) // Eager loads municipio y estado
            ->get();
    
        // Obtiene los programas de la emisora, incluyendo el tipo de programa.
        $programas = EmisoraPrograma::where('id_emisora', $id)
            ->orderBy('id', 'desc')
            ->with('tipoPrograma')  // Eager load tipoPrograma
            ->get();
    
        // Obtiene las fiestas de la emisora.
        $fiestas = Fiesta::where('id_emisora', $id)
            ->orderBy('id', 'desc')
            ->get();
    
        // Devuelve los datos de la emisora, coberturas, programas y fiestas.
        //return  compact('emisora', 'coberturas', 'programas', 'fiestas');
    
        return view('emisora.show', compact('emisora', 'coberturas', 'programas', 'fiestas'));
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
            ->with('success', 'Emisora ​​actualizada correctamente');
    }

    public function destroy($id): RedirectResponse
    {
        Emisora::find($id)->delete();

        return Redirect::route('emisoras.index')
            ->with('success', 'Emisora eliminada exitosamente');
    }


    public function generarExcel($id)
    {
        $emisora = Emisora::findOrFail($id);
        $coberturas = Regiones::where('id_emisora', $id)->with(['municipio.estado'])->get();
        $programas = EmisoraPrograma::where('id_emisora', $id)->with('tipoPrograma')->get();
        $fiestas = Fiesta::where('id_emisora', $id)->get();

        return Excel::download(new EmisoraExport($emisora, $coberturas, $programas, $fiestas), 'reporte_emisora_' . $emisora->name . '.xlsx');
    }

    

    public function generarPdf($id)
    {
        $emisora = Emisora::findOrFail($id);
        $coberturas = Regiones::where('id_emisora', $id)->with(['municipio.estado'])->get();
        $programas = EmisoraPrograma::where('id_emisora', $id)->with('tipoPrograma')->get();
        $fiestas = Fiesta::where('id_emisora', $id)->get();

        $pdf = Pdf::loadView('pdfs.emisora', compact('emisora', 'coberturas', 'programas', 'fiestas'));

        return $pdf->download('reporte_emisora_' . $emisora->name . '.pdf');
    }

}
