<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estado; // Asegúrate de tener este modelo
use App\Models\Municipio; // Asegúrate de tener este modelo

class Selectores extends Component
{
    public $estados = [];
    public $municipios = [];
    public $estadoSeleccionado = null;
    public $municipioSeleccionado = null;

    public function mount($municipioId = null) // Recibe el ID del municipio
    {
        // Ordenar los estados alfabéticamente por nombre
        $this->estados = Estado::orderBy('name')->get();
    
        if ($municipioId) {
            $municipio = Municipio::find($municipioId);
            if ($municipio) {
                $this->municipioSeleccionado = $municipioId;
                $this->estadoSeleccionado = $municipio->estado_id;
                // Ordenar los municipios alfabéticamente por nombre
                $this->municipios = Municipio::where('estado_id', $this->estadoSeleccionado)
                    ->orderBy('name')
                    ->get();
            }
        } else {
            $this->municipios = [];
        }
    }
    
    public function updatedEstadoSeleccionado($estadoId)
    {
        logger('Estado seleccionado: ' . $estadoId);
        
        if ($estadoId) {
            // Ordenar los municipios alfabéticamente por nombre
            $this->municipios = Municipio::where('estado_id', $estadoId)
                ->orderBy('name')
                ->get();
        } else {
            $this->municipios = collect([]); // Inicializar como una colección vacía
        }
        $this->municipioSeleccionado = null; // Reiniciar selección de municipio
    }

    public function render()
    {
        return view('livewire.selectores');
    }
}