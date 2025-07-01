<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Emisora;
use App\Models\Regiones; // Usando el nombre correcto del modelo
use App\Models\TipoPrograma;
use App\Models\EmisoraPrograma;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class FiltroProgramasEmisoras extends Component
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

    // Propiedades para las fechas (recibidas desde la vista padre)
    public $vigencia_desde;
    public $vigencia_hasta;
    public $cantidad_dias_transmision = 0;

    public $precio_base = '';
    public $precio_venta = '';
    public $tipo_cuna = '';
    public $duracion = '';
    public $cunas_por_dia_detalle = [
        'lu' => 0,
        'ma' => 0,
        'mi' => 0,
        'ju' => 0,
        'vi' => 0,
        'sa' => 0,
        'do' => 0,
    ];
    public $bonificacion = 0;
    public $descuento = 0;
    public $cantidad_dias = 1;
    public $valor_unitario = 0;
    public $valor_neto = 0;
    // IVA
    public $usa_iva = false;
    public $valor_iva = 0;
    public $valor_total_con_iva = 0;

    public $id_reporte;

    // Método que se ejecuta al inicializar el componente
    public function mount()
    {
        $this->estados = Estado::all(); // Obtiene todos los estados de la base de datos
        $this->municipios = collect(); // Inicializa las colecciones como vacías
        $this->tiposProgramas = collect();
        $this->emisorasFiltradas = collect();
        $this->emisoraProgramas = collect();
    }

    // Método que se ejecuta cuando cambia la selección del estado
    public function updatedEstadoSeleccionado($estadoId)
    {
        $this->municipioSeleccionado = null; // Resetea los selectores y datos dependientes
        $this->tipoProgramaSeleccionado = null;
        $this->emisoraSeleccionada = null;
        $this->emisoraProgramaSeleccionadoId = null;
        $this->municipios = Municipio::where('estado_id', $estadoId)->get(); // Obtiene los municipios del estado seleccionado
        $this->tiposProgramas = collect();
        $this->emisorasFiltradas = collect();
        $this->emisoraProgramas = collect();
        $this->programaSeleccionado = null;
        $this->resetearValoresCalculadora(); // Resetea los valores de la calculadora
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

        $tiposProgramasIds = EmisoraPrograma::whereIn('id_emisora', $emisorasIds)
            ->pluck('tipo_programa_id')
            ->unique()
            ->toArray();

        $this->tiposProgramas = TipoPrograma::whereIn('id', $tiposProgramasIds)->get();
        $this->emisorasFiltradas = collect();
        $this->emisoraProgramas = collect();
        $this->programaSeleccionado = null;
        $this->resetearValoresCalculadora(); // Resetea los valores de la calculadora
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
        $this->resetearValoresCalculadora(); // Resetea los valores de la calculadora

        if ($this->programaSeleccionado) {
            $this->calcularValores();
        }
        
    }

    private function esPorRegion(int $emisoraId, array $regionesDeMunicipio): bool
    {
        return DB::table('regiones')
            ->where('id_emisora', $emisoraId)
            ->whereIn('id', $regionesDeMunicipio)
            ->exists();
    }

    // Método que se ejecuta cuando se selecciona una emisora// Método que se ejecuta cuando se selecciona una emisora
    public function updatedEmisoraSeleccionada($emisoraId)
    {
        $this->emisoraProgramaSeleccionadoId = null; // Resetea el selector de programas
        $this->emisoraProgramas = EmisoraPrograma::where('id_emisora', $emisoraId)
            ->where('tipo_programa_id', $this->tipoProgramaSeleccionado)
            ->get(); // Obtiene los programas de la emisora y el tipo de programa seleccionado
        $this->programaSeleccionado = null;
        // Obtener si la emisora tiene IVA
        $emisora = Emisora::find($emisoraId);
        $this->usa_iva = $emisora && $emisora->iva == 1;
        $this->resetearValoresCalculadora(); // Resetea los valores de la calculadora
    }

    // Método que se ejecuta cuando se selecciona un programa
    public function updatedEmisoraProgramaSeleccionadoId($emisoraProgramaId)
    {
        $this->programaSeleccionado = EmisoraPrograma::find($emisoraProgramaId); // Obtiene el modelo EmisoraPrograma seleccionado

        if ($this->programaSeleccionado) {
            $this->precio_base = $this->programaSeleccionado->costo; // Asigna el costo al precio base
            $this->precio_venta = $this->programaSeleccionado->venta; // Asigna el precio de venta
            // Inicializar cuñas solo para días activos
            $this->cunas_por_dia_detalle = [
                'lu' => $this->programaSeleccionado->lunes ? 0 : null,
                'ma' => $this->programaSeleccionado->martes ? 0 : null,
                'mi' => $this->programaSeleccionado->miercoles ? 0 : null,
                'ju' => $this->programaSeleccionado->jueves ? 0 : null,
                'vi' => $this->programaSeleccionado->viernes ? 0 : null,
                'sa' => $this->programaSeleccionado->sabado ? 0 : null,
                'do' => $this->programaSeleccionado->domingo ? 0 : null,
            ];
            $this->calcularValores();
        } else {
            $this->resetearValoresCalculadora(); // Resetea si no hay programa seleccionado
        }

        $this->calcularDiasTransmision();
    }

    // En el componente
    protected $rules = [
        'vigencia_desde' => 'required|date_format:d/m/Y|before_or_equal:vigencia_hasta',
        'vigencia_hasta' => 'required|date_format:d/m/Y|after_or_equal:vigencia_desde',
    ];

        // En tu componente
    public function getVigenciaDesdeFormattedProperty()
    {
        return $this->vigencia_desde 
            ? Carbon::parse($this->vigencia_desde)->format('d/m/Y')
            : null;
    }

    public function updated($propertyName)
    {   
        if (
            in_array($propertyName, [
                'precio_base', 'precio_venta', 'tipo_cuna', 'duracion', 'bonificacion', 'descuento'
            ])
            || str_starts_with($propertyName, 'cunas_por_dia_detalle.')
        ) {
            $this->calcularValores();
        }
        if (in_array($propertyName, ['vigencia_desde', 'vigencia_hasta'])) {
            $this->validateOnly($propertyName);
            $this->calcularDiasTransmision();
        }
    }

    public function calcularValores()
    {
        $precioBase = floatval($this->precio_venta ?: $this->precio_base);
        $tipoProgramaNoticiero = [9, 10];
        // Recargo por noticiero
        if (in_array($this->tipoProgramaSeleccionado, $tipoProgramaNoticiero)) {
            $precioBase *= 1.30;
        }
        // Recargo por mención
        if ($this->tipo_cuna == 2) {
            $precioBase *= 1.30;
        }
        // Ajuste por duración
        $factorDuracion = 1;
        if ($this->duracion) {
            $factorDuracion = floatval(str_replace('%', '', $this->duracion)) / 100;
            if ($factorDuracion === 0) {
                $factorDuracion = 1;
            }
        }
        $valorUnitario = $precioBase * $factorDuracion;
        $this->valor_unitario = round($valorUnitario, 2);
        $total_cunas = $this->getTotalCunasPeriodo();
        $valorBruto = $this->valor_unitario * $total_cunas;
        $descuentoPorcentual = $this->descuento ? floatval($this->descuento) / 100 : 0;
        $valorConDescuento = $valorBruto * (1 - $descuentoPorcentual);
        $this->valor_neto = round($valorConDescuento - floatval($this->bonificacion), 2);
        if ($this->usa_iva) {
            $this->valor_iva = round($this->valor_neto * 0.19, 2); // 19% IVA
            $this->valor_total_con_iva = $this->valor_neto + $this->valor_iva;
        } else {
            $this->valor_iva = 0;
            $this->valor_total_con_iva = $this->valor_neto;
        }
    }

    // Método para actualizar el precio de venta manualmente
    public function updatedPrecioVenta($value)
    {
        // Solo permitir valores positivos
        $valor = floatval($value);
        if ($valor < 0) {
            $valor = 0;
        }
        $this->precio_venta = $valor;
        $this->calcularValores();
    }

    // Método para actualizar las cuñas por día de la semana
    public function updatedCunasPorDiaDetalle($value, $key)
    {
        $this->cunas_por_dia_detalle[$key] = $value;
        $this->calcularDiasTransmision();
        $this->calcularValores();
    }

    // Método para calcular la cantidad de días de transmisión según los días seleccionados
    public function calcularDiasTransmision()
    {
        $this->cantidad_dias_transmision = 0;
        $this->cantidad_dias = 0;

        if (!$this->programaSeleccionado || !$this->vigencia_desde || !$this->vigencia_hasta) {
            return;
        }

        try {
            // Convertir fechas (maneja ambos formatos)
            $start = $this->parseDate($this->vigencia_desde);
            $end = $this->parseDate($this->vigencia_hasta);

            // Días activos (nombres en inglés)
            $diasActivos = [
                'monday'    => (bool)$this->programaSeleccionado->lunes,
                'tuesday'   => (bool)$this->programaSeleccionado->martes,
                'wednesday' => (bool)$this->programaSeleccionado->miercoles,
                'thursday'  => (bool)$this->programaSeleccionado->jueves,
                'friday'    => (bool)$this->programaSeleccionado->viernes,
                'saturday'  => (bool)$this->programaSeleccionado->sabado,
                'sunday'    => (bool)$this->programaSeleccionado->domingo,
            ];

            // Contar días
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

    // Nuevo método helper para parsear fechas
    private function parseDate($date)
    {
        if (strpos($date, '/') !== false) {
            return Carbon::createFromFormat('d/m/Y', $date);
        }
        return Carbon::parse($date);
    }

    // Helper para formato moneda colombiana
    public function formatoMoneda($valor)
    {
        if ($valor === '' || $valor === null) return '';
        return '$' . number_format($valor, 2, ',', '.');
    }

    // Método que renderiza la vista del componente
    public function render()
    {
        return view('livewire.filtro-programas-emisoras');
    }

    public function resetearValoresCalculadora()
    {
        $this->precio_base = '';
        $this->precio_venta = '';
        $this->tipo_cuna = '';
        $this->duracion = '';
        $this->cunas_por_dia_detalle = [
            'lu' => 0,
            'ma' => 0,
            'mi' => 0,
            'ju' => 0,
            'vi' => 0,
            'sa' => 0,
            'do' => 0,
        ];
        $this->bonificacion = 0;
        $this->descuento = 0;
        $this->cantidad_dias = 1;
        $this->valor_unitario = 0;
        $this->valor_neto = 0;
        $this->valor_iva = 0;
        $this->valor_total_con_iva = 0;
    }

    // Devuelve el total de cuñas en el periodo seleccionado considerando los días activos y la cantidad de cuñas por día
    public function getTotalCunasPeriodo()
    {
        if (!$this->vigencia_desde || !$this->vigencia_hasta) {
            return 0;
        }
        try {
            $start = $this->parseDate($this->vigencia_desde);
            $end = $this->parseDate($this->vigencia_hasta);
            $total = 0;
            $diasMap = [
                'lu' => 'Monday',
                'ma' => 'Tuesday',
                'mi' => 'Wednesday',
                'ju' => 'Thursday',
                'vi' => 'Friday',
                'sa' => 'Saturday',
                'do' => 'Sunday',
            ];
            $diasPorSemana = array_keys($this->cunas_por_dia_detalle);
            $current = $start->copy();
            while ($current <= $end) {
                foreach ($diasPorSemana as $key) {
                    if ($current->englishDayOfWeek === $diasMap[$key] && isset($this->cunas_por_dia_detalle[$key]) && $this->cunas_por_dia_detalle[$key] > 0) {
                        $total += $this->cunas_por_dia_detalle[$key];
                    }
                }
                $current->addDay();
            }
            return $total;
        } catch (\Exception $e) {
            return 0;
        }
    }

    public function updatedDescuento($value)
    {
        // Solo permitir enteros positivos y máximo 100
        $valor = intval($value);
        if ($valor < 0) {
            $valor = 0;
        }
        if ($valor > 100) {
            $valor = 100;
        }
        $this->descuento = $valor;
    }

    public function updatedBonificacion($value)
    {
        // Solo permitir valores positivos y máximo valor neto
        $valor = floatval($value);
        if ($valor < 0) {
            $valor = 0;
        }
        // Si ya se calculó el valor neto, no permitir bonificación mayor
        if ($valor > $this->valor_neto) {
            $valor = $this->valor_neto;
        }
        $this->bonificacion = $valor;
    }

    public function updatedVigenciaDesde($value)
    {
        if ($this->vigencia_hasta && $value > $this->vigencia_hasta) {
            $this->vigencia_desde = $this->vigencia_hasta;
        } else {
            $this->vigencia_desde = $value;
        }
    }

    public function updatedVigenciaHasta($value)
    {
        if ($this->vigencia_desde && $value < $this->vigencia_desde) {
            $this->vigencia_hasta = $this->vigencia_desde;
        } else {
            $this->vigencia_hasta = $value;
        }
    }

    // Validación antes de guardar (puedes llamarla en el método de guardado)
    public function validarAntesDeGuardar()
    {
        if ($this->getTotalCunasPeriodo() == 0) {
            session()->flash('error', 'El total de cuñas debe ser mayor a 0.');
            return false;
        }
        if ($this->precio_venta <= 0) {
            session()->flash('error', 'El precio de venta debe ser mayor a 0.');
            return false;
        }
        if (!$this->vigencia_desde || !$this->vigencia_hasta) {
            session()->flash('error', 'Debe seleccionar un periodo de vigencia válido.');
            return false;
        }
        if ($this->vigencia_desde > $this->vigencia_hasta) {
            session()->flash('error', 'La fecha de inicio no puede ser mayor que la de fin.');
            return false;
        }
        return true;
    }

    public function guardar()
    {
        if (!$this->validarAntesDeGuardar()) {
            return;
        }
        $this->validate([
            'precio_base' => 'required|numeric|min:0',
            'precio_venta' => 'required|numeric|min:1',
            'tipo_cuna' => 'required|in:1,2',
            'duracion' => 'required',
            'cunas_por_dia_detalle' => 'required|array',
            'bonificacion' => 'required|numeric',
            'descuento' => 'required|numeric|min:0|max:100',
            'cantidad_dias' => 'required|integer|min:1',
            'valor_unitario' => 'required|numeric',
            'valor_neto' => 'required|numeric',
        ]);
        $item = \App\Models\ReporteItem::create([
            'reporte_id' => $this->id_reporte,
            'id_emisora' => $this->emisoraSeleccionada,
            'programa_id' => $this->emisoraProgramaSeleccionadoId,
            'tipo_cuna' => $this->tipo_cuna,
            'duracion' => $this->duracion,
            'horario' => $this->programaSeleccionado->horario ?? '',
            'cantidad_dias' => $this->cantidad_dias_transmision,
            'cunas_por_dia' => $this->getTotalCunasPeriodo(),
            'bonificacion' => $this->bonificacion,
            'valor_unitario' => $this->valor_unitario,
            'descuento' => $this->descuento,
            'valor_neto' => $this->valor_neto,
            'cunas_por_dia_detalle' => json_encode($this->cunas_por_dia_detalle),
            'precio_base' => $this->precio_base,
            'precio_venta' => $this->precio_venta,
            'tipo_programa_id' => $this->tipoProgramaSeleccionado,
            'factor_duracion' => $this->duracion ? floatval(str_replace('%', '', $this->duracion)) / 100 : null,
            'recargo_noticiero' => in_array($this->tipoProgramaSeleccionado, [9,10]) ? 1 : 0,
            'recargo_mencion' => $this->tipo_cuna == 2 ? 1 : 0,
            'iva_aplicado' => $this->usa_iva ? 19 : 0,
            'valor_iva' => $this->valor_iva,
            'valor_total_con_iva' => $this->valor_total_con_iva,
            'usuario_creador_id' => Auth::id(),
        ]);
        session()->flash('success', 'Ítem creado correctamente');
        return redirect()->route('reportes.reporte-items.index', ['id_reporte' => $this->id_reporte]);
    }
}