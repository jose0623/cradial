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

    public function mount()
    {
        try {
            $this->estados = Estado::all();
            $this->municipios = [];
            logger('Inicial: Estados cargados.');
        } catch (\Exception $e) {
            logger('Error al cargar los estados: ' . $e->getMessage());
            $this->estados = [];
        }
    }
    public function updatedEstadoSeleccionado($estadoId)
    {
        logger('Estado seleccionado: ' . $estadoId);
        
        if ($estadoId) {
            $this->municipios = Municipio::where('estado_id', $estadoId)->get();
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