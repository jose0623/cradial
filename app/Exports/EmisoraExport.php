<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EmisoraExport implements FromView, ShouldAutoSize, WithStyles
{
    protected $emisora;
    protected $coberturas;
    protected $programas;
    protected $fiestas;

    public function __construct($emisora, $coberturas, $programas, $fiestas)
    {
        $this->emisora = $emisora;
        $this->coberturas = $coberturas;
        $this->programas = $programas;
        $this->fiestas = $fiestas;
    }

    public function view(): View
    {
        return view('exports.emisora', [
            'emisora' => $this->emisora,
            'coberturas' => $this->coberturas,
            'programas' => $this->programas,
            'fiestas' => $this->fiestas,
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
            2    => ['font' => ['bold' => true]],
            4    => ['font' => ['bold' => true]],
            // ... puedes agregar más estilos aquí
        ];
    }
}