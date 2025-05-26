<?php

namespace App\Exports;

use App\Models\Fiesta;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class FiestasExport implements FromQuery, WithHeadings, WithMapping
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
        return Fiesta::where('id_emisora', $this->id_emisora)
            ->with('emisora')
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('nombre', 'like', '%'.$this->search.'%')
                      ->orWhere('fecha', 'like', '%'.$this->search.'%')
                      ->orWhereHas('emisora', function($q) {
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
            'Fecha',
            'Emisora'
        ];
    }

    public function map($fiesta): array
    {
        return [
            $fiesta->id,
            $fiesta->nombre,
            $fiesta->fecha,
            $fiesta->emisora->name ?? 'N/A'
        ];
    }
}