<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\EmisoraPrograma;
use App\Exports\EmisoraProgramasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class EmisoraProgramaSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $perPage = 10;
    public $sortField = 'nombre_programa';
    public $sortDirection = 'asc';
    public $id_emisora;
    
    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
        'sortField' => ['except' => 'nombre_programa'],
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
        $export = new EmisoraProgramasExport(
            $this->id_emisora,
            $this->search,
            $this->sortField,
            $this->sortDirection
        );
        
        return Excel::download($export, 'programas_emisora_'.$this->id_emisora.'_'.now()->format('Y-m-d').'.xlsx');
    }

    public function exportPdf()
    {
        $programas = $this->getQuery()->get()->map(function ($programa) {
            return [
                'nombre' => $this->sanitizeString($programa->nombre_programa),
                'tipo' => $programa->tipoPrograma->name ?? 'N/A',
                'dias' => $this->getDiasPrograma($programa),
                'horario' => $programa->horario,
                'locutor' => $this->sanitizeString($programa->nombre_locutor),
                'activo' => $programa->activo ? 'Sí' : 'No',
                'costo' => $programa->costo
            ];
        });
        
        $nombreEmisora = EmisoraPrograma::where('id_emisora', $this->id_emisora)
            ->first()
            ->emisora->name ?? 'Emisora';
        
        $pdf = PDF::loadView('exports.emisora-programas-pdf', [
            'programas' => $programas,
            'title' => 'Programas de '.$nombreEmisora,
            'emisora' => $nombreEmisora
        ])->setPaper('a4', 'landscape');
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'programas_emisora_'.$this->id_emisora.'_'.now()->format('Y-m-d').'.pdf');
    }

    protected function getQuery()
    {
        return EmisoraPrograma::where('id_emisora', $this->id_emisora)
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('nombre_programa', 'like', '%'.$this->search.'%')
                      ->orWhere('nombre_locutor', 'like', '%'.$this->search.'%')
                      ->orWhere('horario', 'like', '%'.$this->search.'%')
                      ->orWhereHas('tipoPrograma', function($q) {
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

    protected function getDiasPrograma($programa)
    {
        $dias = [];
        if ($programa->lunes) $dias[] = 'L';
        if ($programa->martes) $dias[] = 'M';
        if ($programa->miercoles) $dias[] = 'MI';
        if ($programa->jueves) $dias[] = 'J';
        if ($programa->viernes) $dias[] = 'V';
        if ($programa->sabado) $dias[] = 'S';
        if ($programa->domingo) $dias[] = 'D';
        
        return implode(', ', $dias);
    }

    public function render()
    {
        $emisoraProgramas = $this->getQuery()->paginate($this->perPage);
        return view('livewire.emisora-programa-search', compact('emisoraProgramas'));
    }
}