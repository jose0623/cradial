<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipoPrograma;
use App\Exports\TipoProgramasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class TipoProgramaSearch extends Component
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
        $export = new TipoProgramasExport(
            $this->search,
            $this->sortField,
            $this->sortDirection
        );
        
        return Excel::download($export, 'tipo_programas_'.now()->format('Y-m-d').'.xlsx');
    }

    public function exportPdf()
    {
        $tipoProgramas = $this->getQuery()->get()->map(function ($tipoPrograma) {
            return [
                'id' => $tipoPrograma->id,
                'name' => $this->sanitizeString($tipoPrograma->name)
            ];
        });
        
        $pdf = PDF::loadView('exports.tipo-programas-pdf', [
            'tipoProgramas' => $tipoProgramas,
            'title' => 'Reporte de Tipos de Programas'
        ])->setPaper('a4', 'landscape');
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'tipo_programas_'.now()->format('Y-m-d').'.pdf');
    }

    protected function getQuery()
    {
        return TipoPrograma::when($this->search, function($query) {
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
        $tipoProgramas = $this->getQuery()->paginate($this->perPage);
        return view('livewire.tipo-programa-search', compact('tipoProgramas'));
    }
}