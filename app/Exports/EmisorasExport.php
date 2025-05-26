<?php

namespace App\Exports;

use App\Models\Emisora;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize; // Añadido para autoajustar columnas
use Maatwebsite\Excel\Concerns\WithStyles; // Añadido para aplicar estilos
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet; // Añadido para tipado de estilos

class EmisorasExport implements FromQuery, WithHeadings, WithMapping, ShouldAutoSize, WithStyles
{
    protected $search;
    protected $estadoId;
    protected $municipioId;
    protected $tipoEmisoraId;
    protected $sortField;
    protected $sortDirection;
    protected $filterActiva; // Nuevo filtro: emisora_activa

    public function __construct($search, $estadoId, $municipioId, $tipoEmisoraId, $sortField, $sortDirection, $filterActiva)
    {
        $this->search = $search;
        $this->estadoId = $estadoId;
        $this->municipioId = $municipioId;
        $this->tipoEmisoraId = $tipoEmisoraId;
        $this->sortField = $sortField;
        $this->sortDirection = $sortDirection;
        $this->filterActiva = $filterActiva; // Asigna el nuevo filtro
    }

    /**
    * @return \Illuminate\Database\Eloquent\Builder
    */
    public function query()
    {
        return Emisora::with(['municipio.estado', 'tipoEmisora'])
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('name', 'like', '%'.$this->search.'%')
                      ->orWhere('dial', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->estadoId, function($query) {
                return $query->whereHas('municipio.estado', function($q) {
                    $q->where('id', $this->estadoId);
                });
            })
            ->when($this->municipioId, function($query) {
                return $query->where('municipio_id', $this->municipioId);
            })
            ->when($this->tipoEmisoraId, function($query) {
                return $query->where('tipo_emisoras_id', $this->tipoEmisoraId);
            })
            // --- APLICA EL NUEVO FILTRO DE ESTADO ACTIVO ---
            ->when($this->filterActiva !== '', function ($query) { 
                $query->where('emisora_activa', (bool) $this->filterActiva);
            })
            ->orderBy($this->sortField, $this->sortDirection);
    }

    /**
     * Define los encabezados de las columnas en el archivo Excel.
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Dial',
            'Tipo Emisora',
            'Departamento',
            'Municipio',
            'Teléfono',
            'Email',
            'Emisora Activa', // Nuevo encabezado
            'Observación Estado Emisora', // Nuevo encabezado
        ];
    }

    /**
     * Mapea cada registro a una fila en el archivo Excel.
     * @param mixed $emisora
     * @return array
     */
    public function map($emisora): array
    {
        return [
            $emisora->id,
            $emisora->name,
            $emisora->dial,
            $emisora->tipoEmisora->name ?? 'N/A',
            $emisora->municipio->estado->name ?? 'N/A',
            $emisora->municipio->name ?? 'N/A',
            $emisora->telefono1,
            $emisora->email,
            $emisora->emisora_activa ? 'Sí' : 'No', // Mapea el valor booleano a 'Sí' o 'No'
            $emisora->observacion_estado_emisora, // Mapea la observación
        ];
    }

    /**
     * Aplica estilos a la hoja de cálculo.
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para la primera fila (encabezados)
            1    => ['font' => ['bold' => true]],
        ];
    }
}
