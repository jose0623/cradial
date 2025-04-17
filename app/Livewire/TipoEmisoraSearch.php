<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\TipoEmisora;
use App\Exports\TipoEmisorasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class TipoEmisoraSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $perPage = 10;
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
        $export = new TipoEmisorasExport(
            $this->search,
            $this->sortField,
            $this->sortDirection
        );
        
        return Excel::download($export, 'tipo_emisoras_'.now()->format('Y-m-d').'.xlsx');
    }

    public function exportPdf()
    {
        $tipoEmisoras = $this->getQuery()->get()->map(function ($tipoEmisora) {
            return [
                'id' => $tipoEmisora->id,
                'name' => $this->sanitizeString($tipoEmisora->name)
            ];
        });
        
        $pdf = PDF::loadView('exports.tipo-emisoras-pdf', [
            'tipoEmisoras' => $tipoEmisoras,
            'title' => 'Reporte de Tipos de Emisoras'
        ])->setPaper('a4', 'landscape');
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'tipo_emisoras_'.now()->format('Y-m-d').'.pdf');
    }

    protected function getQuery()
    {
        return TipoEmisora::when($this->search, function($query) {
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
        $tipoEmisoras = $this->getQuery()->paginate($this->perPage);
        return view('livewire.tipo-emisora-search', compact('tipoEmisoras'));
    }
}