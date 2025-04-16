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
        $this->resetearValoresCalculadora(); // Resetea los valores de la calculadora
    }

    // Método que se ejecuta cuando se selecciona un programa
    public function updatedEmisoraProgramaSeleccionadoId($emisoraProgramaId)
    {
        $this->programaSeleccionado = EmisoraPrograma::find($emisoraProgramaId); // Obtiene el modelo EmisoraPrograma seleccionado

        if ($this->programaSeleccionado) {
            $this->precio_base = $this->programaSeleccionado->costo; // Asigna el costo al precio base
            $this->calcularValores(); // Calcula los valores al seleccionar el programa
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
        if (in_array($propertyName, ['vigencia_desde', 'vigencia_hasta'])) {
            $this->validateOnly($propertyName);
            $this->calcularDiasTransmision();
        }

        if (in_array($propertyName, ['precio_base', 'tipo_cuna', 'duracion', 'cunas_por_dia', 'bonificacion', 'descuento', 'cantidad_dias'])) {
            $this->calcularValores();
        }
    }

    public function calcularValores()
    {
        // Precio base dinámico
        $precioBase = $this->precio_base ? floatval($this->precio_base) : 0;
    
        // Aplicar +30% si es noticiero (tipo 9 o 10)
        if (in_array($this->tipoProgramaSeleccionado, [9, 10])) {
            $precioBase *= 1.30;
        }
    
        // Factor de duración
        $factorDuracion = $this->duracion ? floatval(str_replace('%', '', $this->duracion)) / 100 : 1;
    
        // Precio con duración
        $precioConDuracion = $precioBase * $factorDuracion;
        $valorUnitario = $precioConDuracion;
    
        // Recargo por mención (tipo_cuna = 2)
        if ($this->tipo_cuna == 2) {
            $valorUnitario *= 1.30;
        }
    
        // Cálculo final
        $this->valor_unitario = round($valorUnitario, 2);
        $this->valor_dia = round($valorUnitario * $this->cunas_por_dia, 2); // Nuevo cálculo
        
        $valorBruto = $this->valor_dia * $this->cantidad_dias;
        $descuentoPorcentual = $this->descuento ? floatval($this->descuento) / 100 : 0;
        $this->valor_neto = round($valorBruto * (1 - $descuentoPorcentual), 2);
    }

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
        $this->valor_neto = 0;
    }


    // Propiedades para las fechas (recibidas desde la vista padre)
    public $vigencia_desde;
    public $vigencia_hasta;
    public $cantidad_dias_transmision = 0;

    // Método para calcular días de transmisión
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

   


    // Método que renderiza la vista del componente
    public function render()
    {
        return view('livewire.filtro-programas-emisoras');
    }
}