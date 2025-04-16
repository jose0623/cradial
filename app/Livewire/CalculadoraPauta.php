<?php

namespace App\Livewire;

use Livewire\Component;

class CalculadoraPauta extends Component
{
    public $precio_base = 0; // Ahora es una propiedad para el input
    public $tipo_cuna = '';
    public $duracion = '';
    public $cunas_por_dia = 1;
    public $bonificacion = 0;
    public $descuento = 0;
    public $cantidad_dias = 1;
    public $valor_unitario = 0;
    public $valor_neto = 0;

    public function mount()
    {
        $this->calcularValores();
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['precio_base', 'tipo_cuna', 'duracion', 'cunas_por_dia', 'bonificacion', 'descuento'])) {
            $this->calcularValores();
        }
    }

    public function calcularValores()
    {
        $precioBase = floatval($this->precio_base);
        $factorDuracion = 1;

        if ($this->duracion) {
            $factorDuracion = floatval(str_replace('%', '', $this->duracion)) / 100;
            if ($factorDuracion === 0) {
                $factorDuracion = 1;
            }
        }

        $precioConDuracion = $precioBase * $factorDuracion;
        $valorUnitarioCalculado = $precioConDuracion;

        if ($this->tipo_cuna == 2) { // Mención
            $precioBaseConRecargo = $precioBase * 1.30;
            $valorUnitarioCalculado = $precioBaseConRecargo * $factorDuracion;
        }

        $this->valor_unitario = round($valorUnitarioCalculado, 2);
        $valorBruto = $this->valor_unitario * $this->cunas_por_dia * $this->cantidad_dias;
        $valorConDescuento = $valorBruto - floatval($this->descuento);
        $this->valor_neto = round($valorConDescuento + floatval($this->bonificacion), 2);
    }

    public function render()
    {
        return view('livewire.calculadora-pauta');
    }
}