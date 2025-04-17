<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Municipio;
use App\Exports\MunicipiosExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class MunicipioSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $perPage = 8;
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
        $export = new MunicipiosExport(
            $this->search,
            $this->sortField,
            $this->sortDirection
        );
        
        return Excel::download($export, 'municipios_'.now()->format('Y-m-d').'.xlsx');
    }

    public function exportPdf()
    {
        $municipios = $this->getQuery()->get()->map(function ($municipio) {
            return [
                'id' => $municipio->id,
                'name' => $this->sanitizeString($municipio->name),
                'estado' => $this->sanitizeString($municipio->estado->name ?? 'N/A')
            ];
        });
        
        $pdf = PDF::loadView('exports.municipios-pdf', [
            'municipios' => $municipios,
            'title' => 'Reporte de Municipios'
        ])->setPaper('a4', 'landscape');
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'municipios_'.now()->format('Y-m-d').'.pdf');
    }

    protected function getQuery()
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

    protected function sanitizeString($string)
    {
        return mb_convert_encoding($string ?? '', 'UTF-8', 'UTF-8');
    }

    public function render()
    {
        $municipios = $this->getQuery()->paginate($this->perPage);
        return view('livewire.municipio-search', compact('municipios'));
    }
}