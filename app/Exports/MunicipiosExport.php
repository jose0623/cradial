<?php

namespace App\Exports;

use App\Models\Municipio;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class MunicipiosExport implements FromQuery, WithHeadings, WithMapping
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
        return Municipio::with('estado')
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('name', 'like', '%'.$this->search.'%')
                      ->orWhereHas('estado', function($q) {
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
            'Nombre',
            'Estado'
        ];
    }

    public function map($municipio): array
    {
        return [
            $municipio->id,
            $municipio->name,
            $municipio->estado->name ?? 'N/A'
        ];
    }
}