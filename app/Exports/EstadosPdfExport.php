<?php

namespace App\Exports;

use App\Models\Estado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EstadosPdfExport implements FromView
{
    protected $estados;

    public function __construct($estados)
    {
        $this->estados = $estados;
    }

    public function view(): View
    {
        return view('exports.estados-pdf', [
            'estados' => $this->estados
        ]);
    }
}