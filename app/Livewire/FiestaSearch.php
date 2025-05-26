<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Fiesta;
use App\Exports\FiestasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class FiestaSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $perPage = 20;
    public $sortField = 'nombre';
    public $sortDirection = 'asc';
    public $id_emisora;
    
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 20],
        'sortField' => ['except' => 'nombre'],
        'sortDirection' => ['except' => 'asc'],
    ];

    public function mount($id_emisora)
    {
        $this->id_emisora = $id_emisora;
    }

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
        $export = new FiestasExport(
            $this->id_emisora,
            $this->search,
            $this->sortField,
            $this->sortDirection
        );
        
        return Excel::download($export, 'fiestas_emisora_'.$this->id_emisora.'_'.now()->format('Y-m-d').'.xlsx');
    }

    public function exportPdf()
    {
        $fiestas = $this->getQuery()->get()->map(function ($fiesta) {
            return [
                'nombre' => $this->sanitizeString($fiesta->nombre),
                'fecha' => $fiesta->fecha,
                'emisora' => $fiesta->emisora->name ?? 'N/A'
            ];
        });
        
        $nombreEmisora = Fiesta::where('id_emisora', $this->id_emisora)
            ->first()
            ->emisora->name ?? 'Emisora';
        
        $pdf = PDF::loadView('exports.fiestas-pdf', [
            'fiestas' => $fiestas,
            'title' => 'Fiestas de '.$nombreEmisora,
            'emisora' => $nombreEmisora
        ])->setPaper('a4', 'landscape');
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'fiestas_emisora_'.$this->id_emisora.'_'.now()->format('Y-m-d').'.pdf');
    }

    protected function getQuery()
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

    protected function sanitizeString($string)
    {
        return mb_convert_encoding($string ?? '', 'UTF-8', 'UTF-8');
    }

    public function render()
    {
        $fiestas = $this->getQuery()->paginate($this->perPage);
        return view('livewire.fiesta-search', compact('fiestas'));
    }
}