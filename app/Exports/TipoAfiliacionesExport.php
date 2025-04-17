<?php

namespace App\Exports;

use App\Models\TipoAfiliacione;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TipoAfiliacionesExport implements FromQuery, WithHeadings, WithMapping
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
        return TipoAfiliacione::when($this->search, function($query) {
            return $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->orderBy($this->sortField, $this->sortDirection);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre'
        ];
    }

    public function map($tipoAfiliacione): array
    {
        return [
            $tipoAfiliacione->id,
            $tipoAfiliacione->name
        ];
    }
}