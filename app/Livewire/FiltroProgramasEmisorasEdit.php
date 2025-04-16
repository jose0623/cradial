<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Emisora;
use App\Models\Regiones;
use App\Models\TipoPrograma;
use App\Models\EmisoraPrograma;
use App\Models\ReporteItem;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class FiltroProgramasEmisorasEdit extends Component
{
    // Propiedades públicas para almacenar los datos y las selecciones del usuario
    public Collection $estados;
    public Collection $municipios;
    public Collection $tiposProgramas;
    public Collection $emisorasFiltradas;
    public Collection $emisoraProgramas;
    public ?EmisoraPrograma $programaSeleccionado = null;
    public ?int $estadoSeleccionado = null;
    public ?int $municipioSeleccionado = null;
    public ?int $tipoProgramaSeleccionado = null;
    public ?int $emisoraSeleccionada = null;
    public ?int $emisoraProgramaSeleccionadoId = null;

    public $precio_base = '';
    public $tipo_cuna = '';
    public $duracion = '';
    public $cunas_por_dia = 1;
    public $bonificacion = 0;
    public $descuento = 0;
    public $cantidad_dias = 1;
    public $valor_unitario = 0;
    public $valor_dia = 0;
    public $valor_neto = 0;
    

    public bool $isEditing = false;
    public ?int $registroIdParaEditar = null;
    public ?int $reporteItemId = null;

    protected $rules = [
        'precio_base' => 'required|numeric|min:0',
        'tipo_cuna' => 'nullable|in:1,2',
        'duracion' => 'nullable|in:30%,50%,60%,75%,85%,100%,120%,133%,150%,170%,185%,200%',
        'cunas_por_dia' => 'required|integer|min:1',
        'bonificacion' => 'nullable|numeric',
        'descuento' => 'nullable|numeric|min:0|max:100',
        'cantidad_dias' => 'nullable|integer|min:1',
        'vigencia_desde' => 'nullable|date_format:d/m/Y|before_or_equal:vigencia_hasta',
        'vigencia_hasta' => 'nullable|date_format:d/m/Y|after_or_equal:vigencia_desde',
    ];

    public $vigencia_desde;
    public $vigencia_hasta;
    public $cantidad_dias_transmision = 0;
    public $id;
    public $idreporte;

    // Método que se ejecuta al inicializar el componente
    public function mount(?int $id = null, ?string $vigencia_desde = null, ?string $vigencia_hasta = null, ?int $emisoraSeleccionada = null)
    {
        $this->estados = Estado::all();
        $this->municipios = collect();
        $this->tiposProgramas = collect();
        $this->emisorasFiltradas = collect();
        $this->emisoraProgramas = collect();
        $this->reporteItemId = $id;
        $this->vigencia_desde = $vigencia_desde;
        $this->vigencia_hasta = $vigencia_hasta;
        $this->emisoraSeleccionada = $emisoraSeleccionada;  // Asigna el valor pasado desde la vista

        if ($this->reporteItemId) {
            $this->cargarDatosDesdeReporteItem($this->reporteItemId);
        }
    }

    // Método para cargar los datos de un ReporteItem existente
    private function cargarDatosDesdeReporteItem(int $reporteItemId)
    {
        try {
            $reporteItem = ReporteItem::with(['emisora.municipio.estado', 'programa'])->findOrFail($reporteItemId);

            $this->programaSeleccionado = $reporteItem->programa;

            $this->estadoSeleccionado = $reporteItem->emisora->municipio->estado_id ?? null;
            if ($this->estadoSeleccionado) {
                $this->municipios = Municipio::where('estado_id', $this->estadoSeleccionado)->get();
                $this->municipioSeleccionado = $reporteItem->emisora->municipio_id ?? null;
                if ($this->municipioSeleccionado) {
                    $regionesDelMunicipio = Regiones::where('municipio_id', $this->municipioSeleccionado)->pluck('id')->toArray();
                    $emisorasIds = Emisora::where('municipio_id', $this->municipioSeleccionado)->pluck('id')->toArray();
                    $emisorasPorRegion = Emisora::whereIn('id', function ($query) use ($regionesDelMunicipio) {
                        $query->select('id_emisora')
                            ->from('regiones')
                            ->whereIn('id', $regionesDelMunicipio);
                    })->pluck('id')->toArray();
                    $emisorasIds = array_unique(array_merge($emisorasIds, $emisorasPorRegion));

                    $this->tiposProgramas = TipoPrograma::whereIn('id', function ($query) use ($emisorasIds) {
                        $query->select('tipo_programa_id')
                            ->from('emisora_programas')
                            ->whereIn('id_emisora', $emisorasIds);
                    })->get();

                    $this->tipoProgramaSeleccionado = $reporteItem->programa->tipo_programa_id ?? null;

                    $this->emisorasFiltradas = Emisora::whereIn('id', $emisorasIds)->get()->map(function ($emisora) use ($regionesDelMunicipio) {
                        $emisora->es_direccion_fisica = ($emisora->municipio_id == $this->municipioSeleccionado);
                        $emisora->es_por_region = $this->esPorRegion($emisora->id, $regionesDelMunicipio);
                        return $emisora;
                    });


                    if ($this->emisoraSeleccionada) {
                        $this->emisoraProgramas = EmisoraPrograma::where('id_emisora', $this->emisoraSeleccionada)
                            ->where('tipo_programa_id', $this->tipoProgramaSeleccionado)
                            ->get();
                        $this->emisoraProgramaSeleccionadoId = $reporteItem->programa_id ?? null;
                    }
                }
            }

            // Asegúrate de que esta línea esté presente y sea correcta
            $this->precio_base = $reporteItem->programa->costo ?? '';
            $this->tipo_cuna = $reporteItem->tipo_cuna ?? '';
            $this->duracion = $reporteItem->duracion ?? '';
            $this->cunas_por_dia = $reporteItem->cunas_por_dia ?? 1;
            $this->bonificacion = $reporteItem->bonificacion ?? 0;
            $this->descuento = $reporteItem->descuento ?? 0;
            $this->cantidad_dias = $reporteItem->cantidad_dias ?? 1;
            $this->vigencia_desde = $this->vigencia_desde ? Carbon::parse($this->vigencia_desde)->format('d/m/Y') : null;
            $this->vigencia_hasta = $this->vigencia_hasta ? Carbon::parse($this->vigencia_hasta)->format('d/m/Y') : null;

            $this->calcularDiasTransmision();
            $this->isEditing = true;
            $this->registroIdParaEditar = $reporteItem->id;
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            session()->flash('error', 'El Reporte Item seleccionado no se encontró.');
            $this->resetearEstadoEdicion();
        }
    }

    // Método que se ejecuta cuando cambia la selección del estado
    public function updatedEstadoSeleccionado($estadoId)
    {
        $this->municipioSeleccionado = null;
        $this->tipoProgramaSeleccionado = null;
        $this->emisoraSeleccionada = null;
        $this->emisoraProgramaSeleccionadoId = null;
        $this->municipios = Municipio::where('estado_id', $estadoId)->get();
        $this->tiposProgramas = collect();
        $this->emisorasFiltradas = collect();
        $this->emisoraProgramas = collect();
        $this->programaSeleccionado = null;
        $this->resetearValoresCalculadora();
        $this->isEditing = false;
        $this->registroIdParaEditar = null;
    }

    // Método que se ejecuta cuando cambia la selección del municipio
    public function updatedMunicipioSeleccionado($municipioId)
    {
        $this->tipoProgramaSeleccionado = null;
        $this->emisoraSeleccionada = null;
        $this->emisoraProgramaSeleccionadoId = null;
        $regionesDelMunicipio = Regiones::where('municipio_id', $municipioId)->pluck('id')->toArray();
        $emisorasIds = Emisora::where('municipio_id', $municipioId)->pluck('id')->toArray();
        $emisorasPorRegion = Emisora::whereIn('id', function ($query) use ($regionesDelMunicipio) {
            $query->select('id_emisora')
                ->from('regiones')
                ->whereIn('id', $regionesDelMunicipio);
        })->pluck('id')->toArray();
        $emisorasIds = array_unique(array_merge($emisorasIds, $emisorasPorRegion));

        $this->tiposProgramas = TipoPrograma::whereIn('id', function ($query) use ($emisorasIds) {
            $query->select('tipo_programa_id')
                ->from('emisora_programas')
                ->whereIn('id_emisora', $emisorasIds);
        })->get();
        $this->emisorasFiltradas = collect();
        $this->emisoraProgramas = collect();
        $this->programaSeleccionado = null;
        $this->resetearValoresCalculadora();
        $this->isEditing = false;
        $this->registroIdParaEditar = null;
    }

    // Método que se ejecuta cuando cambia la selección del tipo de programa
    public function updatedTipoProgramaSeleccionado($tipoProgramaId)
    {
        $this->emisoraSeleccionada = null;
        $this->emisoraProgramaSeleccionadoId = null;
        $municipiosDeEstado = Municipio::where('estado_id', $this->estadoSeleccionado)->pluck('id')->toArray();
        $regionesDeMunicipio = Regiones::where('municipio_id', $this->municipioSeleccionado)->pluck('id')->toArray();
        $emisorasIdsMunicipio = Emisora::whereIn('municipio_id', $municipiosDeEstado)->pluck('id')->toArray();
        $emisorasIdsRegion = Emisora::whereIn('id', function ($query) use ($regionesDeMunicipio) {
            $query->select('id_emisora')
                ->from('regiones')
                ->whereIn('id', $regionesDeMunicipio);
        })->pluck('id')->toArray();
        $emisorasIds = array_unique(array_merge($emisorasIdsMunicipio, $emisorasIdsRegion));
        $emisorasConTipoPrograma = EmisoraPrograma::whereIn('id_emisora', $emisorasIds)
            ->where('tipo_programa_id', $tipoProgramaId)
            ->pluck('id_emisora')
            ->unique()
            ->toArray();
        $this->emisorasFiltradas = Emisora::whereIn('id', $emisorasConTipoPrograma)->get()->map(function ($emisora) use ($municipiosDeEstado, $regionesDeMunicipio) {
            $emisora->es_direccion_fisica = in_array($emisora->municipio_id, $municipiosDeEstado);
            $emisora->es_por_region = $this->esPorRegion($emisora->id, $regionesDeMunicipio);
            return $emisora;
        });
        $this->emisoraProgramas = collect();
        $this->programaSeleccionado = null;
        $this->resetearValoresCalculadora();
        $this->isEditing = false;
        $this->registroIdParaEditar = null;
    }

    private function esPorRegion(int $emisoraId, array $regionesDeMunicipio): bool
    {
        return DB::table('regiones')
            ->where('id_emisora', $emisoraId)
            ->whereIn('id', $regionesDeMunicipio)
            ->exists();
    }

    // Método que se ejecuta cuando cambia la selección de la emisora
    public function updatedEmisoraSeleccionada($emisoraId)
    {
        $this->emisoraProgramaSeleccionadoId = null;
        $this->emisoraProgramas = EmisoraPrograma::where('id_emisora', $emisoraId)
            ->where('tipo_programa_id', $this->tipoProgramaSeleccionado)
            ->get();
        $this->programaSeleccionado = null;
        $this->resetearValoresCalculadora();
        $this->isEditing = false;
        $this->registroIdParaEditar = null;
    }

    // Método que se ejecuta cuando cambia la selección del programa de la emisora
    public function updatedEmisoraProgramaSeleccionadoId($emisoraProgramaId)
    {
        $this->programaSeleccionado = EmisoraPrograma::find($emisoraProgramaId);

        if ($this->programaSeleccionado) {
            $this->precio_base = $this->programaSeleccionado->costo ?? '';
            $this->tipo_cuna = $this->programaSeleccionado->tipo_cuna ?? '';
            $this->duracion = $this->programaSeleccionado->duracion ?? '';
            $this->cunas_por_dia = $this->programaSeleccionado->cunas_por_dia ?? 1;
            $this->bonificacion = $this->bonificacion ?? 0;
            $this->descuento = $this->descuento ?? 0;
            $this->cantidad_dias = $this->programaSeleccionado->cantidad_dias ?? 1;
            $this->calcularValores();
            $this->calcularDiasTransmision();
            $this->isEditing = true;
            $this->registroIdParaEditar = $emisoraProgramaId;
        } else {
            $this->resetearValoresCalculadora();
            $this->isEditing = false;
            $this->registroIdParaEditar = null;
        }
    }

    public function getVigenciaDesdeFormattedProperty()
    {
        return $this->vigencia_desde
            ? Carbon::parse($this->vigencia_desde)->format('d/m/Y')
            : null;
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['vigencia_desde', 'vigencia_hasta'])) {
            $this->validateOnly($propertyName);
            $this->calcularDiasTransmision();
        }

        if (in_array($propertyName, ['precio_base', 'tipo_cuna', 'duracion', 'cunas_por_dia', 'bonificacion', 'descuento', 'cantidad_dias'])) {
            $this->calcularValores();
        }
    }

    // Método para calcular los valores de la transmisión
    public function calcularValores()
    {
        $precioBase = $this->precio_base ? floatval($this->precio_base) : 0;

        if (in_array($this->tipoProgramaSeleccionado, [9, 10])) {
            $precioBase *= 1.30;
        }

        $factorDuracion = $this->duracion ? floatval(str_replace('%', '', $this->duracion)) / 100 : 1;
        $precioConDuracion = $precioBase * $factorDuracion;
        $valorUnitario = $precioConDuracion;

        if ($this->tipo_cuna == 2) {
            $valorUnitario *= 1.30;
        }

        $this->valor_unitario = round($valorUnitario, 2);
        $this->valor_dia = round($valorUnitario * $this->cunas_por_dia, 2);

        $valorBruto = $this->valor_dia * $this->cantidad_dias;
        $descuentoPorcentual = $this->descuento ? floatval($this->descuento) / 100 : 0;
        $this->valor_neto = round($valorBruto * (1 - $descuentoPorcentual), 2);
    }

    // Método para resetear los valores de la calculadora
    public function resetearValoresCalculadora()
    {
        $this->precio_base = '';
        $this->tipo_cuna = '';
        $this->duracion = '';
        $this->cunas_por_dia = 1;
        $this->bonificacion = 0;
        $this->descuento = 0;
        $this->cantidad_dias = 1;
        $this->valor_unitario = 0;
        $this->valor_dia = 0;
        $this->valor_neto = 0;
    }

    // Método para calcular los días de transmisión basados en las fechas de vigencia y los días activos del programa
    public function calcularDiasTransmision()
    {
        $this->cantidad_dias_transmision = 0;
        $this->cantidad_dias = 0;

        if (!$this->programaSeleccionado || !$this->vigencia_desde || !$this->vigencia_hasta) {
            return;
        }

        try {
            $start = $this->parseDate($this->vigencia_desde);
            $end = $this->parseDate($this->vigencia_hasta);

            $diasActivos = [
                'monday'    => (bool)$this->programaSeleccionado->lunes,
                'tuesday'   => (bool)$this->programaSeleccionado->martes,
                'wednesday' => (bool)$this->programaSeleccionado->miercoles,
                'thursday'  => (bool)$this->programaSeleccionado->jueves,
                'friday'    => (bool)$this->programaSeleccionado->viernes,
                'saturday'  => (bool)$this->programaSeleccionado->sabado,
                'sunday'    => (bool)$this->programaSeleccionado->domingo,
            ];

            $current = $start->copy();
            while ($current <= $end) {
                $dayName = strtolower($current->englishDayOfWeek);
                if ($diasActivos[$dayName]) {
                    $this->cantidad_dias_transmision++;
                }
                $current->addDay();
            }

            $this->cantidad_dias = $this->cantidad_dias_transmision;
            $this->calcularValores();

        } catch (\Exception $e) {
            Log::error("Error calculando días: " . $e->getMessage());
        }
    }

    private function parseDate($date)
    {
        if (strpos($date, '/') !== false) {
            return Carbon::createFromFormat('d/m/Y', $date);
        }
        return Carbon::parse($date);
    }

    // Método para guardar los cambios del programa
    public function guardarCambiosPrograma()
    {
        $this->validate();

        if ($this->programaSeleccionado) {
            $this->programaSeleccionado->costo = $this->precio_base;
            $this->programaSeleccionado->tipo_cuna = $this->tipo_cuna;
            $this->programaSeleccionado->duracion = $this->duracion;
            $this->programaSeleccionado->cunas_por_dia = $this->cunas_por_dia;
            $this->programaSeleccionado->bonificacion = $this->bonificacion;
            $this->programaSeleccionado->descuento = $this->descuento;
            $this->programaSeleccionado->cantidad_dias = $this->cantidad_dias;
            $this->programaSeleccionado->vigencia_desde = $this->vigencia_desde ? Carbon::createFromFormat('d/m/Y', $this->vigencia_desde)->toDateString() : null;
            $this->programaSeleccionado->vigencia_hasta = $this->vigencia_hasta ? Carbon::createFromFormat('d/m/Y', $this->vigencia_hasta)->toDateString() : null;
            $this->programaSeleccionado->save();
            session()->flash('mensaje', 'Programa actualizado con éxito.');
            $this->resetearEstadoEdicion();
            $this->cargarProgramas($this->emisoraSeleccionada, $this->tipoProgramaSeleccionado);
        }
    }

    // Método para resetear el estado de edición
    public function resetearEstadoEdicion()
    {
        $this->isEditing = false;
        $this->programaSeleccionado = null;
        $this->emisoraProgramaSeleccionadoId = null;
        $this->resetearValoresCalculadora();
        $this->registroIdParaEditar = null;
    }

    private function cargarProgramas(?int $emisoraId, ?int $tipoProgramaId)
    {
        if ($emisoraId && $tipoProgramaId) {
            $this->emisoraProgramas = EmisoraPrograma::where('id_emisora', $emisoraId)
                ->where('tipo_programa_id', $tipoProgramaId)
                ->get();
        } else {
            $this->emisoraProgramas = collect();
        }
    }

    // Método para renderizar la vista del componente
    public function render()
    {
        return view('livewire.filtro-programas-emisoras-edit');
    }
}





