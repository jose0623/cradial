<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Emisora;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Regiones;

class MunicipioForm extends Component
{
    public $emisora_id;
    public $estado_id;
    public $selectedMunicipios = [];
    public $municipios = [];
    public $emisoras = [];
    public $estados = [];
    public $regiones = [];
    public $selectedMunicipiosIds = [];

    public function mount($emisora_id)
    {
        $this->emisora_id = $emisora_id;
        $this->emisoras = Emisora::all();
        $this->estados = Estado::all();

        // Cargar regiones y verificar que haya datos
        $this->regiones = Regiones::with('emisora', 'municipio')
            ->where('emisora_id', $emisora_id)
            ->get();

        // Verificación de que la colección no esté vacía
        if ($this->regiones->isEmpty()) {
            $this->selectedMunicipiosIds = [];
        } else {
            $this->selectedMunicipiosIds = $this->regiones->pluck('municipio_id')->toArray();
        }
    }

    public function updatedEstadoId($estado_id)
    {
        $this->municipios = $estado_id ? Municipio::where('estado_id', $estado_id)->get() : [];
    }

    public function save()
    {
        foreach ($this->selectedMunicipios as $municipio_id) {
            // Verificar si ya existe un registro con el mismo emisora_id y municipio_id
            $existingRegion = Regiones::where('emisora_id', $this->emisora_id)
                ->where('municipio_id', $municipio_id)
                ->first();

            if (!$existingRegion) {
                Regiones::create([
                    'emisora_id' => $this->emisora_id,
                    'municipio_id' => $municipio_id,
                ]);
            }
        }

        // Actualizar regiones
        $this->regiones = Regiones::with('emisora', 'municipio')
            ->where('emisora_id', $this->emisora_id)
            ->get();

        // Manejo de la colección de regiones
        if ($this->regiones->isNotEmpty()) {
            $this->selectedMunicipiosIds = $this->regiones->pluck('municipio_id')->toArray();
        } else {
            $this->selectedMunicipiosIds = [];
        }

        session()->flash('message', 'Municipios registrados exitosamente.');
    }

    public function delete($regionId)
    {
        $region = Regiones::find($regionId);
        if ($region) {
            $region->delete();
            $this->regiones = Regiones::with('emisora', 'municipio')
                ->where('emisora_id', $this->emisora_id)
                ->get();
            $this->selectedMunicipiosIds = $this->regiones->pluck('municipio_id')->toArray();
            session()->flash('message', 'Registro eliminado exitosamente.');
        }
    }

    public function render()
    {
        return view('livewire.municipio-form', [
            'emisoras' => $this->emisoras,
            'estados' => $this->estados,
            'regiones' => $this->regiones,
            'selectedMunicipiosIds' => $this->selectedMunicipiosIds,
        ]);
    }
}
