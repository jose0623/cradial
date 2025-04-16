<?php

namespace App\Exports;

use App\Models\Estado;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EstadosExport implements FromQuery, WithHeadings, WithMapping
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
        return Estado::with('paise')
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('name', 'like', '%'.$this->search.'%')
                      ->orWhereHas('paise', function($q) {
                          $q->where('name', 'like', '%'.$this->search.'%');
                      });
                });
            })
            ->orderBy($this->sortField, $this->sortDirection);
    }

    public function headings(): array
    {
        return [
            'N°',
            'Nombre',
            'País',
        ];
    }

    public function map($estado): array
    {
        return [
            $estado->id,
            $estado->name,
            $estado->paise->name ?? 'N/A',
        ];
    }
}