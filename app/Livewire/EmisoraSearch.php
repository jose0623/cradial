<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Emisora;
use App\Models\Municipio;
use App\Models\TipoEmisora;
use App\Models\Estado;
use App\Exports\EmisorasExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class EmisoraSearch extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    
    public $search = '';
    public $perPage = 10;
    public $sortField = 'name';
    public $sortDirection = 'asc';
    public $selectedEstado = '';
    public $selectedMunicipio = '';
    public $selectedTipoEmisora = '';
    
    // --- NUEVA PROPIEDAD ---
    public $filterActiva = ''; // Para filtrar por estado activo/inactivo (1: Activa, 0: Inactiva, vacío: Todas)

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage' => ['except' => 10],
        'sortField' => ['except' => 'name'],
        'sortDirection' => ['except' => 'asc'],
        'selectedEstado' => ['except' => ''],
        'selectedMunicipio' => ['except' => ''],
        'selectedTipoEmisora' => ['except' => ''],
        'filterActiva' => ['except' => ''], // Añade esta propiedad al queryString
    ];

    // Escucha el evento para eliminar (ya estaba presente)
    protected $listeners = ['deleteEmisora' => 'delete']; 

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedEstado()
    {
        $this->reset('selectedMunicipio');
        $this->resetPage();
    }

    public function updatingSelectedMunicipio()
    {
        $this->resetPage();
    }

    public function updatingSelectedTipoEmisora()
    {
        $this->resetPage();
    }

    // --- NUEVO MÉTODO PARA RESETEAR LA PÁGINA AL FILTRAR POR ACTIVA ---
    public function updatingFilterActiva() 
    {
        $this->resetPage();
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

    public function exportExcel()
    {
        $export = new EmisorasExport(
            $this->search,
            $this->selectedEstado,
            $this->selectedMunicipio,
            $this->selectedTipoEmisora,
            $this->sortField,
            $this->sortDirection,
            $this->filterActiva // Pasa el nuevo filtro al constructor del Export
        );
        
        return Excel::download($export, 'emisoras_'.now()->format('Y-m-d').'.xlsx');
    }

    public function exportPdf()
    {
        // Obtiene las emisoras usando la misma lógica de consulta, incluyendo el nuevo filtro
        $emisoras = $this->getQuery()->get()->map(function ($emisora) {
            return [
                'name' => $emisora->name,
                'dial' => $emisora->dial,
                'tipo_emisora' => $emisora->tipoEmisora->name ?? 'N/A',
                'departamento' => $emisora->municipio->estado->name ?? 'N/A',
                'municipio' => $emisora->municipio->name ?? 'N/A',
                'telefono' => $emisora->telefono1,
                'email' => $emisora->email,
                'emisora_activa' => $emisora->emisora_activa ? 'Sí' : 'No', // Añade el nuevo campo
                'observacion_estado_emisora' => $emisora->observacion_estado_emisora ?? 'N/A' // Añade el nuevo campo
            ];
        });
        
        $pdf = PDF::loadView('exports.emisoras-pdf', [
            'emisoras' => $emisoras,
            'filtros' => [
                'estado' => $this->selectedEstado ? Estado::find($this->selectedEstado)->name : 'Todos',
                'municipio' => $this->selectedMunicipio ? Municipio::find($this->selectedMunicipio)->name : 'Todos',
                'tipo_emisora' => $this->selectedTipoEmisora ? TipoEmisora::find($this->selectedTipoEmisora)->name : 'Todos',
                'emisora_activa' => $this->filterActiva === '1' ? 'Activas' : ($this->filterActiva === '0' ? 'Inactivas' : 'Todas') // Añade el filtro de estado al PDF
            ]
        ])->setPaper('a4', 'landscape');
        
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->output();
        }, 'emisoras_'.now()->format('Y-m-d').'.pdf');
    }

    // --- MÉTODO PROTEGIDO PARA CONSTRUIR LA CONSULTA ---
    protected function getQuery()
    {
        return Emisora::with(['municipio.estado', 'tipoEmisora'])
            ->when($this->search, function($query) {
                return $query->where(function($q) {
                    $q->where('name', 'like', '%'.$this->search.'%')
                      ->orWhere('dial', 'like', '%'.$this->search.'%');
                });
            })
            ->when($this->selectedEstado, function($query) {
                return $query->whereHas('municipio.estado', function($q) {
                    $q->where('id', $this->selectedEstado);
                });
            })
            ->when($this->selectedMunicipio, function($query) {
                return $query->where('municipio_id', $this->selectedMunicipio);
            })
            ->when($this->selectedTipoEmisora, function($query) {
                return $query->where('tipo_emisoras_id', $this->selectedTipoEmisora);
            })
            // --- NUEVO FILTRO PARA EMISORA ACTIVA EN LA CONSULTA ---
            ->when($this->filterActiva !== '', function ($query) { 
                $query->where('emisora_activa', (bool) $this->filterActiva);
            });
    }

    public function render()
    {
        $estados = Estado::orderBy('name')->get();
        $municipios = $this->selectedEstado 
            ? Municipio::where('estado_id', $this->selectedEstado)->orderBy('name')->get() 
            : collect();
        $tiposEmisora = TipoEmisora::orderBy('name')->get();
        
        // Usa el método getQuery para obtener las emisoras
        $emisoras = $this->getQuery()->paginate($this->perPage);
        
        return view('livewire.emisora-search', compact(
            'emisoras', 
            'estados',
            'municipios',
            'tiposEmisora'
        ));
    }

    public function delete($id)
    {
        $emisora = Emisora::find($id);
        if ($emisora) {
            $emisora->delete();
            session()->flash('success', 'Emisora eliminada correctamente.'); // Usar 'success' para consistencia
        } else {
            session()->flash('error', 'Emisora no encontrada.');
        }
    }
}
