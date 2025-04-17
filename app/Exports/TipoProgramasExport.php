<?php

namespace App\Exports;

use App\Models\TipoPrograma;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TipoProgramasExport implements FromQuery, WithHeadings, WithMapping
{
    protected $search;
    protected $sortField;
    protected $sortDirection;

    public function __construct($search, $sortField, $sortDirection)
    {
        $this->search = $search;
        $this->sortField = $sortField;
        $this->sortDirection = $sortDirection;
    }

    public function query()
    {
        return TipoPrograma::when($this->search, function($query) {
            return $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->orderBy($this->sortField, $this->sortDirection);
    }
    
    public function headings(): array
    {
        return [
            'ID',
            'Nombre' // Eliminamos la columna de conteo
        ];
    }
    

    public function map($tipoPrograma): array
    {
        return [
            $tipoPrograma->id,
            $tipoPrograma->name // Solo mostramos estos datos
        ];
    }
}