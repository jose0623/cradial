<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipoAfiliacione;
use App\Exports\TipoAfiliacionesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class TipoAfiliacionSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $perPage = 9;
    public $sortField = 'name';
    public $sortDirection = 'asc';
    
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
        'sortField' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function exportExcel()
    {
        $export = new TipoAfiliacionesExport(
            $this->search,
            $this->sortField,
            $this->sortDirection
        );
        
        return Excel::download($export, 'tipo_afiliaciones_'.now()->format('Y-m-d').'.xlsx');
    }

    public function exportPdf()
    {
        $tipoAfiliaciones = $this->getQuery()->get()->map(function ($tipoAfiliacione) {
            return [
                'id' => $tipoAfiliacione->id,
                'name' => $this->sanitizeString($tipoAfiliacione->name)
            ];
        });
        
        $pdf = PDF::loadView('exports.tipo-afiliaciones-pdf', [
            'tipoAfiliaciones' => $tipoAfiliaciones,
            'title' => 'Reporte de Tipos de Afiliación'
        ])->setPaper('a4', 'landscape');
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'tipo_afiliaciones_'.now()->format('Y-m-d').'.pdf');
    }

    protected function getQuery()
    {
        return TipoAfiliacione::when($this->search, function($query) {
            return $query->where('name', 'like', '%'.$this->search.'%');
        })
        ->orderBy($this->sortField, $this->sortDirection);
    }

    protected function sanitizeString($string)
    {
        return mb_convert_encoding($string ?? '', 'UTF-8', 'UTF-8');
    }

    public function render()
    {
        $tipoAfiliaciones = $this->getQuery()->paginate($this->perPage);
        return view('livewire.tipo-afiliacion-search', compact('tipoAfiliaciones'));
    }
}