<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Estado;
use App\Exports\EstadosExport;
use App\Exports\EstadosPdfExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class EstadoSearch extends Component
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

    // Método para exportar a Excel
    public function exportExcel()
    {
        // Eliminar la línea con $this->emit()
        $export = new EstadosExport(
            $this->search,
            $this->sortField,
            $this->sortDirection
        );
        
        return Excel::download($export, 'departamentos_'.now()->format('Y-m-d').'.xlsx');
    }

    // Método para exportar a PDF
    public function exportPdf()
{
    $estados = $this->getQuery()->get()->map(function ($estado) {
        return [
            'id' => $estado->id,
            'name' => $this->sanitizeString($estado->name),
            'pais' => $this->sanitizeString($estado->paise->name ?? 'N/A')
        ];
    });
    
    $pdf = PDF::loadView('exports.estados-pdf', [
        'estados' => $estados,
        'title' => 'Reporte de Departamentos'
    ])->setPaper('a4', 'landscape');
    
    return response()->streamDownload(function() use ($pdf) {
        echo $pdf->output();
    }, 'departamentos_'.now()->format('Y-m-d').'.pdf');
}

    protected function sanitizeString($string)
    {
        // Eliminar caracteres no UTF-8 y normalizar
        $string = mb_convert_encoding($string, 'UTF-8', 'UTF-8');
        return htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    // Método auxiliar para obtener la consulta
    protected function getQuery()
    {
        return Estado::with(['paise'])
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

    public function render()
    {
        $estados = $this->getQuery()->paginate($this->perPage);
        return view('livewire.estado-search', compact('estados'));
    }
}