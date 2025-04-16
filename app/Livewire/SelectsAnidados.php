<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Emisora;
use App\Models\TipoPrograma;
use App\Models\EmisoraPrograma;

class SelectsAnidados extends Component
{
    public $estados = [];
    public $municipios = [];
    public $tiposPrograma = [];
    public $emisoras = [];
    public $emisoraProgramas = [];
    public $programaSeleccionado = null;

    public $selectedEstado = null;
    public $selectedMunicipio = null;
    public $selectedTipoPrograma = null;
    public $selectedEmisora = null;
    public $selectedEmisoraPrograma = null;

    public function mount()
    {
        $this->estados = Estado::all();
    }

    public function render()
    {
        return view('livewire.selects-anidados');
    }

    public function updatedSelectedEstado($estadoId)
    {
        $this->reset(['municipios', 'tiposPrograma', 'emisoras', 'emisoraProgramas', 'selectedMunicipio', 'selectedTipoPrograma', 'selectedEmisora', 'selectedEmisoraPrograma', 'programaSeleccionado']);
        
        if (!is_null($estadoId)) {
            $this->municipios = Municipio::where('estado_id', $estadoId)->get();
        }
    }

    public function updatedSelectedMunicipio($municipioId)
    {
        $this->reset(['tiposPrograma', 'emisoras', 'emisoraProgramas', 'selectedTipoPrograma', 'selectedEmisora', 'selectedEmisoraPrograma', 'programaSeleccionado']);
        
        if (!is_null($municipioId)) {
            $this->tiposPrograma = TipoPrograma::whereHas('emisoras', function($query) use ($municipioId) {
                $query->where('municipio_id', $municipioId);
            })->distinct()->get();
        }
    }

    public function updatedSelectedTipoPrograma($tipoId)
    {
        $this->reset(['emisoras', 'emisoraProgramas', 'selectedEmisora', 'selectedEmisoraPrograma', 'programaSeleccionado']);
        
        if (!is_null($tipoId) && !is_null($this->selectedMunicipio)) {
            $this->emisoras = Emisora::where('municipio_id', $this->selectedMunicipio)
                ->whereHas('tiposPrograma', function($query) use ($tipoId) {
                    $query->where('tipo_programa_id', $tipoId);
                })->get();
        }
    }

    public function updatedSelectedEmisora($emisoraId)
    {
        $this->reset(['emisoraProgramas', 'selectedEmisoraPrograma', 'programaSeleccionado']);
        
        if (!is_null($emisoraId)) {
            $this->emisoraProgramas = EmisoraPrograma::where('id_emisora', $emisoraId)->get();
        }
    }

    public function updatedSelectedEmisoraPrograma($programaId)
    {
        if (!is_null($programaId)) {
            $this->programaSeleccionado = EmisoraPrograma::with('emisora')->find($programaId);
        }
    }
}