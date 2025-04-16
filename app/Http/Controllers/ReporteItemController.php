<?php

namespace App\Http\Controllers;

use App\Models\ReporteItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ReporteItemRequest;
use App\Models\Regiones;
use App\Models\Reporte;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ReporteItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, $id_reporte): View
    {
        //$reporteItems = ReporteItem::where('reporte_id', $id_reporte)->paginate();

        $reporteItems = ReporteItem::where('reporte_id', $id_reporte)
        ->with(['emisora', 'programa']) // Carga ansiosa de las relaciones
        ->paginate();
        //$emisoraProgramas = EmisoraPrograma::where('id_emisora', $id_emisora)->paginate();


         $reporte = Reporte::find($id_reporte);
    
         if ($reporte) {
            $vigencia_desde = $reporte->vigencia_desde;
            $vigencia_hasta = $reporte->vigencia_hasta;
            $subtotal = $reporte->subtotal;
            $total = $reporte->total;

            return view('reporte-item.index', compact('reporteItems', 'id_reporte', 'vigencia_desde' , 'vigencia_hasta', 'subtotal', 'total'))
            ->with('i', ($request->input('page', 1) - 1) * $reporteItems->perPage());

        } else {
            // Manejar el caso en que el reporte no se encuentra.
            abort(404, 'Reporte no encontrado.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id_reporte): View
    {
        $reporteItem = new ReporteItem();
    
        $reporte = Reporte::find($id_reporte);
    
        if ($reporte) {
            $vigencia_desde = $reporte->vigencia_desde;
            $vigencia_hasta = $reporte->vigencia_hasta;
    
            return view('reporte-item.create', compact('reporteItem', 'id_reporte' , 'vigencia_desde' , 'vigencia_hasta'));
        } else {
            // Manejar el caso en que el reporte no se encuentra.
            abort(404, 'Reporte no encontrado.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReporteItemRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            // Crea un nuevo ítem del reporte utilizando los datos validados de la solicitud
            $reporteItem = ReporteItem::create($request->validated());

            // Busca el reporte asociado usando el ID proporcionado
            $reporte = Reporte::findOrFail($request->reporte_id);

            // Calcula el nuevo subtotal sumando el valor neto del nuevo ítem
            $nuevoSubtotal = $reporte->subtotal + $request->valor_neto;

            // Calcula el nuevo IVA basado en el nuevo subtotal y la tasa de IVA del reporte
            $nuevoIva = $nuevoSubtotal * ($reporte->iva / 100);

            // Calcula el nuevo total sumando el nuevo subtotal y el nuevo IVA
            $nuevoTotal = $nuevoSubtotal + $nuevoIva;

            // Actualiza los campos subtotal, IVA y total del reporte
            $reporte->update([
                'subtotal' => $nuevoSubtotal,
                'total' => $nuevoTotal,
                ]);
        });

        $reporteItems = ReporteItem::where('reporte_id', $request->reporte_id)->paginate();
        $id_reporte = $request->reporte_id;


        return Redirect::route('reportes.reporte-items.index', compact('reporteItems','id_reporte' ))
            ->with('success', 'Ítem agregado y reporte actualizado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $reporteItem = ReporteItem::with(['emisora.municipio.estado', 'programa'])->find($id);

        if (!$reporteItem) {
            abort(404, 'Reporte Item no encontrado.');
        }

        $id_reporte = $reporteItem->reporte_id;
        $reporte = Reporte::find($id_reporte);

        if ($reporte) {
            $vigencia_desde = $reporte->vigencia_desde;
            $vigencia_hasta = $reporte->vigencia_hasta;
            $subtotal = $reporte->subtotal;
            $total = $reporte->total;

            // Información de la dirección de la emisora (como antes)
            $direccionEmisora = $reporteItem->emisora->direccion;
            $municipioEmisora = $reporteItem->emisora->municipio->name;
            $estadoEmisora = $reporteItem->emisora->municipio->estado->name;

            // Obtener los municipios de cobertura ordenados por estado
            $municipiosCobertura = Regiones::where('id_emisora', $reporteItem->emisora->id)
                ->with('municipio.estado') // Aseguramos que la relación estado del municipio esté cargada
                ->get()
                ->map(function ($region) {
                    return $region->municipio; // Mapeamos para obtener solo el modelo Municipio
                })
                ->sortBy('estado.name'); // Ordenamos la colección de Municipios por el nombre del estado

            return view('reporte-item.show', compact(
                'reporteItem',
                'id_reporte',
                'vigencia_desde',
                'vigencia_hasta',
                'subtotal',
                'total',
                'direccionEmisora',
                'municipioEmisora',
                'estadoEmisora',
                'municipiosCobertura' // Pasar los municipios de cobertura a la vista
            ));

        } else {
            abort(404, 'Reporte no encontrado.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $reporteItem = ReporteItem::with(['emisora.municipio.estado', 'programa'])->find($id);
        if (!$reporteItem) {
            abort(404, 'Reporte Item no encontrado.');
        }

        $id_reporte = $reporteItem->reporte_id;
        $reporte = Reporte::find($id_reporte);

        if ($reporte) {
            $vigencia_desde = $reporte->vigencia_desde;
            $vigencia_hasta = $reporte->vigencia_hasta;
            $subtotal = $reporte->subtotal;
            $total = $reporte->total;

            $direccionEmisora = $reporteItem->emisora->direccion;
            $municipioEmisora = $reporteItem->emisora->municipio->name;
            $estadoEmisora = $reporteItem->emisora->municipio->estado->name;

            $municipiosCobertura = Regiones::where('id_emisora', $reporteItem->emisora->id)
                ->with('municipio.estado')
                ->get()
                ->map(function ($region) {
                    return $region->municipio;
                })
                ->sortBy('estado.name');

           /* return view('reporte-item.livewire-edit', [ // Cambia el nombre de la vista
                'reporteItem' => $reporteItem,
                'id_reporte' => $id_reporte,
                'vigencia_desde' => $vigencia_desde,
                'vigencia_hasta' => $vigencia_hasta,
                'subtotal' => $subtotal,
                'total' => $total,
                'direccionEmisora' => $direccionEmisora,
                'municipioEmisora' => $municipioEmisora,
                'estadoEmisora' => $estadoEmisora,
                'municipiosCobertura' => $municipiosCobertura,
                'id' => $id, // Pasamos el ID al componente Livewire
            ]);*/


            return view('reporte-item.edit', compact(
                'reporteItem',
                'id_reporte',
                'vigencia_desde',
                'vigencia_hasta',
                'subtotal',
                'total',
                'direccionEmisora',
                'municipioEmisora',
                'estadoEmisora',
                'municipiosCobertura',
                'id', // Pasamos el ID al componente Livewire
            ));

        } else {
            abort(404, 'Reporte no encontrado.');
        }
    }
   
    /**
     * Update the specified resource in storage.
     */
    public function update(ReporteItemRequest $request, ReporteItem $reporteItem): RedirectResponse
    {
        return DB::transaction(function () use ($request, $reporteItem) {
            // Obtén el ID del reporte asociado
            $reporteId = $reporteItem->reporte_id;

            // Obtén el reporte asociado
            $reporte = Reporte::findOrFail($reporteId);

            // Guarda el valor neto anterior del item
            $valorNetoAnterior = $reporteItem->valor_neto;

            // Actualiza los datos del ReporteItem
            $reporteItem->update($request->validated());

            // Calcula la diferencia entre el valor neto nuevo y el anterior
            $diferenciaValorNeto = $request->valor_neto - $valorNetoAnterior;

            // Calcula el nuevo subtotal del reporte
            $nuevoSubtotal = $reporte->subtotal + $diferenciaValorNeto;

            // Asegúrate de que el subtotal no sea negativo (aunque en una actualización no debería pasar)
            $nuevoSubtotal = max(0, $nuevoSubtotal);

            // Calcula el nuevo IVA
            $nuevoIva = $nuevoSubtotal * ($reporte->iva / 100);

            // Calcula el nuevo total
            $nuevoTotal = $nuevoSubtotal + $nuevoIva;

            // Actualiza los campos subtotal y total del reporte
            $reporte->update([
                'subtotal' => $nuevoSubtotal,
                'total' => $nuevoTotal,
            ]);

            $reporteItems = ReporteItem::where('reporte_id', $reporteId)->paginate();
            $id_reporte = $reporteId;

            return Redirect::route('reportes.reporte-items.index', compact('reporteItems', 'id_reporte'))
                ->with('success', 'Ítem del reporte actualizado correctamente');
        });
    }


    public function destroy($id): RedirectResponse
    {
        return DB::transaction(function () use ($id) {
            // Busca el ítem del reporte a eliminar
            $reporteItem = ReporteItem::findOrFail($id);

            // Obtiene el ID del reporte asociado
            $reporteId = $reporteItem->reporte_id;

            // Obtiene el valor neto del ítem a eliminar
            $valorNetoEliminado = $reporteItem->valor_neto;

            // Elimina el ítem del reporte
            $reporteItem->delete();

            // Busca el reporte asociado para actualizar los totales
            $reporte = Reporte::findOrFail($reporteId);

            // Calcula el nuevo subtotal restando el valor neto del ítem eliminado
            $nuevoSubtotal = $reporte->subtotal - $valorNetoEliminado;

            // Asegúrate de que el subtotal no sea negativo
            $nuevoSubtotal = max(0, $nuevoSubtotal);

            // Calcula el nuevo IVA basado en el nuevo subtotal y la tasa de IVA del reporte
            $nuevoIva = $nuevoSubtotal * ($reporte->iva / 100);

            // Calcula el nuevo total sumando el nuevo subtotal y el nuevo IVA
            $nuevoTotal = $nuevoSubtotal + $nuevoIva;

            // Actualiza los campos subtotal, IVA y total del reporte
            $reporte->update([
                'subtotal' => $nuevoSubtotal,
                'total' => $nuevoTotal,
            ]);

            $reporteItems = ReporteItem::where('reporte_id', $reporteId)->paginate();
            $id_reporte = $reporteId;

            return Redirect::route('reportes.reporte-items.index', compact('reporteItems', 'id_reporte'))
                ->with('success', 'Ítem eliminado y reporte actualizado correctamente');
        });
    }
}
