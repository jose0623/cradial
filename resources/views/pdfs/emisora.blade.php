<!DOCTYPE html>
<html>
<head>
    <title>Reporte Emisora - {{ $emisora->name }}</title>
    <style>
        body { font-family: sans-serif; font-size: 10pt; }
        .container { width: 100%; }
        .row { display: flex; flex-wrap: wrap; margin-bottom: 10px; }
        .col-md-3 { width: 25%; padding-right: 10px; }
        .col-md-6 { width: 50%; padding-right: 10px; }
        .col-md-12 { width: 100%; margin-bottom: 10px; }
        strong { font-weight: bold; }
        hr { margin-top: 20px; margin-bottom: 20px; border: 0; border-top: 1px solid #ccc; }
        .list-group { list-style: none; padding: 0; }
        .list-group-item { border: 1px solid #ddd; margin-bottom: 5px; padding: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hoja de Vida de la Emisora - {{ $emisora->name }}</h2>
        <hr>

        <h4>Información General</h4>
        <div class="row">
            <div class="col-md-3"><strong>Nombre:</strong> {{ $emisora->name }}</div>
            <div class="col-md-3"><strong>Potencia:</strong> {{ $emisora->potencia }}</div>
            <div class="col-md-3"><strong>Dial:</strong> {{ $emisora->dial }}</div>
            <div class="col-md-3"><strong>Tipo Emisora:</strong> {{ $emisora->tipoEmisora->name }}</div>
        </div>
        <div class="row">
            <div class="col-md-3"><strong>Tipo Documento:</strong>
                @if ($emisora->tipo_documento == 1) NIT @endif
                @if ($emisora->tipo_documento == 2) C.C @endif
                @if ($emisora->tipo_documento == 3) C.E @endif
                @if ($emisora->tipo_documento == 4) T.I @endif
                @if ($emisora->tipo_documento == 5) OTRO @endif
            </div>
            <div class="col-md-3"><strong>Identificación:</strong> {{ $emisora->identificacion }}</div>
            <div class="col-md-3"><strong>Municipio:</strong> {{ $emisora->municipio->name }}</div>
            <div class="col-md-3"><strong>Dirección:</strong> {{ $emisora->direccion }}</div>
        </div>
        <hr>

        <h4>Características</h4>
        <div class="row">
            <div class="col-md-3"><strong>Tiene Real Audio:</strong> {{ $emisora->tiene_real_audio == 1 ? 'Si' : 'No' }}</div>
            <div class="col-md-3"><strong>Real Audio:</strong> {{ $emisora->real_audio }}</div>
            <div class="col-md-6"><strong>Descripción Real Audio:</strong> {{ $emisora->descripcion_real_audio }}</div>
        </div>
        <div class="row">
            <div class="col-md-3"><strong>Utiliza Remoto:</strong> {{ $emisora->utiliza_remoto == 1 ? 'Si' : 'No' }}</div>
            <div class="col-md-3"><strong>Tarifa Remoto:</strong> {{ $emisora->tarifa_remoto }}</div>
            <div class="col-md-3"><strong>Tiempo del Remoto:</strong> {{ $emisora->tiempo_remoto }}</div>
            <div class="col-md-3"><strong>Descripción del Remoto:</strong> {{ $emisora->descripcion_remoto }}</div>
        </div>
        <div class="row">
            <div class="col-md-3"><strong>Utiliza Perifoneo:</strong> {{ $emisora->utiliza_perifoneo == 1 ? 'Si' : 'No' }}</div>
            <div class="col-md-3"><strong>Tarifa Perifoneo:</strong> {{ $emisora->tarifa_perifoneo }}</div>
            <div class="col-md-3"><strong>Tiempo del Perifoneo:</strong> {{ $emisora->tiempo_perifoneo }}</div>
            <div class="col-md-3"><strong>Descripción del Perifoneo:</strong> {{ $emisora->descripcion_perifoneo }}</div>
        </div>
        <div class="row">
            <div class="col-md-3"><strong>Web:</strong> {{ $emisora->web }}</div>
            <div class="col-md-3"><strong>Clase de Pauta:</strong> {{ $emisora->clase_pauta }}</div>
            <div class="col-md-3"><strong>Licencia Funcionamiento:</strong> {{ $emisora->licencia_funcionamiento }}</div>
            <div class="col-md-3"><strong>Afiliación:</strong> {{ $emisora->tipoAfiliacione->name }}</div>
        </div>
        <div class="row">
            <div class="col-md-3"><strong>Cantidad Mínima:</strong> {{ $emisora->cantidad_minima }}</div>
            <div class="col-md-3"><strong>Iva:</strong> {{ $emisora->iva == 1 ? 'Si' : 'No' }}</div>
            <div class="col-md-3"><strong>Nombre Periódico:</strong> {{ $emisora->nombre_periodico }}</div>
            <div class="col-md-3"><strong>Nombre Canal Televisión:</strong> {{ $emisora->nombre_canal_television }}</div>
        </div>
        <hr>

        <h4>Contactos</h4>
        <div class="row">
            <div class="col-md-3"><strong>Facebook:</strong> {{ $emisora->facebook }}</div>
            <div class="col-md-3"><strong>Instagram:</strong> {{ $emisora->instagram }}</div>
            <div class="col-md-3"><strong>Tiktok:</strong> {{ $emisora->tiktok }}</div>
            <div class="col-md-3"><strong>Email:</strong> {{ $emisora->email }}</div>
        </div>
        <div class="row">
            <div class="col-md-3"><strong>Email 2:</strong> {{ $emisora->email2 }}</div>
            <div class="col-md-3"><strong>Email 3:</strong> {{ $emisora->email3 }}</div>
            <div class="col-md-3"><strong>Teléfono:</strong> {{ $emisora->telefono1 }}</div>
            <div class="col-md-3"><strong>Celular:</strong> {{ $emisora->celular }}</div>
        </div>
        <hr>
        <h4>Responsables</h4>
        <div class="row">
            <div class="col-md-3"><strong>Gerente:</strong> {{ $emisora->gerente }}</div>
            <div class="col-md-3"><strong>Teléfono Gerente:</strong> {{ $emisora->telefono_gerente }}</div>
            <div class="col-md-3"><strong>Director Noticias:</strong> {{ $emisora->director_noticias }}</div>
            <div class="col-md-3"><strong>Teléfono Director Noticias:</strong> {{ $emisora->telefono_director_noticias }}</div>
        </div>
        <div class="row">
            <div class="col-md-3"><strong>Encargado de Pauta:</strong> {{ $emisora->encargado_pauta }}</div>
            <div class="col-md-3"><strong>Teléfono Encargado de Pauta:</strong> {{ $emisora->telefono_encargado_pauta }}</div>
            <div class="col-md-3"><strong>Representante Legal:</strong> {{ $emisora->representante_legal }}</div>
            <div class="col-md-3"><strong>Teléfono Representante Legal:</strong> {{ $emisora->telefono_representante_legal }}</div>
        </div>
        <hr>

        <h4>Observaciones</h4>
        <div class="row">
            <div class="col-md-12">{{ $emisora->observaciones }}</div>
        </div>
        <hr>

        <h4>Coberturas</h4>
        @if($coberturas->count() > 0)
            <ul class="list-group">
                @foreach($coberturas as $cobertura)
                    <li class="list-group-item">
                        <strong>Municipio:</strong> {{ $cobertura->municipio->name }} |
                        <strong>Dpto:</strong> {{ $cobertura->municipio->estado->name }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay coberturas registradas para esta emisora.</p>
        @endif
        <hr>

        <h4>Fiestas</h4>
        @if($fiestas->count() > 0)
            <ul class="list-group">
                @foreach($fiestas as $fiesta)
                    <li class="list-group-item">
                        <strong>Nombre:</strong> {{ $fiesta->nombre }} |
                        <strong>Fecha:</strong> {{ $fiesta->fecha }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay fiestas registradas para esta emisora.</p>
        @endif
        <hr>

        <h4>Programas</h4>
        @if($programas->count() > 0)
            <ul class="list-group">
                @foreach($programas as $programa)
                    <li class="list-group-item">
                        <strong>Nombre:</strong> {{ $programa->nombre_programa }} |
                        <strong>Locutor:</strong> {{ $programa->nombre_locutor }} |
                        <strong>Tipo:</strong> {{ $programa->tipoPrograma->name }} |
                        <strong>Horario:</strong> {{ $programa->horario }} |
                        <strong>Tarifa:</strong> {{ $programa->costo }} |
                        <strong>Días:</strong>
                        <small>
                            {{ $programa->lunes ? 'LU ' : '' }}
                            {{ $programa->martes ? 'MA ' : ''}}
                            {{ $programa->miercoles ? 'MI ' : ''}}
                            {{ $programa->jueves ? 'JU ' : ''}}
                            {{ $programa->viernes ? 'VI ' : ''}}
                            {{ $programa->sabado ? 'SA ' : ''}}
                            {{ $programa->domingo ? 'DO' : ''}}
                        </small>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay programas registrados para esta emisora.</p>
        @endif
    </div>
</body>
</html>