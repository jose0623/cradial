<?php

namespace App\Exports;

use App\Models\EmisoraPrograma;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmisoraProgramasExport implements FromQuery, WithHeadings, WithMapping
{
    protected $id_emisora;
    protected $search;
    protected $sortField;
    protected $sortDirection;

    public function __construct($id_emisora, $search, $sortField, $sortDirection)
    {
        $this->id_emisora = $id_emisora;
        $this->search = $search;
        $this->sortField = $sortField;
        $this->sortDirection = $sortDirection;
    }

    public function query()
    {
        return EmisoraPrograma::where('id_emisora', $this->id_emisora)
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('nombre_programa', 'like', '%'.$this->search.'%')
                      ->orWhere('nombre_locutor', 'like', '%'.$this->search.'%')
                      ->orWhere('horario', 'like', '%'.$this->search.'%')
                      ->orWhereHas('tipoPrograma', function($q) {
                          $q->where('name', 'like', '%'.$this->search.'%');
                      });
                });
            })
            ->orderBy($this->sortField, $this->sortDirection);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre del Programa',
            'Tipo de Programa',
            'Lunes',
            'Martes',
            'Miércoles',
            'Jueves',
            'Viernes',
            'Sábado',
            'Domingo',
            'Horario',
            'Locutor',
            'Activo',
            'Costo',
            'Venta'
        ];
    }

    public function map($programa): array
    {
        return [
            $programa->id,
            $programa->nombre_programa,
            $programa->tipoPrograma->name ?? 'N/A',
            $programa->lunes ? 'Sí' : 'No',
            $programa->martes ? 'Sí' : 'No',
            $programa->miercoles ? 'Sí' : 'No',
            $programa->jueves ? 'Sí' : 'No',
            $programa->viernes ? 'Sí' : 'No',
            $programa->sabado ? 'Sí' : 'No',
            $programa->domingo ? 'Sí' : 'No',
            $programa->horario,
            $programa->nombre_locutor,
            $programa->activo ? 'Sí' : 'No',
            $programa->costo,
            $programa->venta
        ];
    }
}