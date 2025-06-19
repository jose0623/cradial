<table>
    <thead>
        <tr>
            <th colspan="4">Información General de la Emisora</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Nombre:</strong></td>
            <td>{{ $emisora->name }}</td>
            <td><strong>Potencia:</strong></td>
            <td>{{ $emisora->potencia }}</td>
        </tr>
        <tr>
            <td><strong>Dial:</strong></td>
            <td>{{ $emisora->dial }}</td>
            <td><strong>Tipo Emisora:</strong></td>
            <td>{{ $emisora->tipoEmisora->name }}</td>
        </tr>
        <tr>
            <td><strong>Tipo Documento:</strong></td>
            <td>
                @if ($emisora->tipo_documento == 1) NIT @endif
                @if ($emisora->tipo_documento == 2) C.C @endif
                @if ($emisora->tipo_documento == 3) C.E. @endif
                @if ($emisora->tipo_documento == 4) T.I. @endif
                @if ($emisora->tipo_documento == 5) OTRO @endif
            </td>
            <td><strong>Identificación:</strong></td>
            <td>{{ $emisora->identificacion }}</td>
        </tr>
        <tr>
            <td><strong>Municipio:</strong></td>
            <td>{{ $emisora->municipio->name }}</td>
            <td><strong>Dirección:</strong></td>
            <td>{{ $emisora->direccion }}</td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <thead>
        <tr>
            <th colspan="4">Características</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Tiene Real Audio:</strong></td>
            <td>{{ $emisora->tiene_real_audio == 1 ? 'Si' : 'No' }}</td>
            <td><strong>Real Audio:</strong></td>
            <td>{{ $emisora->real_audio }}</td>
        </tr>
        <tr>
            <td><strong>Descripción Real Audio:</strong></td>
            <td colspan="3">{{ $emisora->descripcion_real_audio }}</td>
        </tr>
        <tr>
            <td><strong>Utiliza Remoto:</strong></td>
            <td>{{ $emisora->utiliza_remoto == 1 ? 'Si' : 'No' }}</td>
            <td><strong>Tarifa Remoto:</strong></td>
            <td>{{ $emisora->tarifa_remoto }}</td>
        </tr>
        <tr>
            <td><strong>Tiempo del Remoto:</strong></td>
            <td>{{ $emisora->tiempo_remoto }}</td>
            <td><strong>Descripción del Remoto:</strong></td>
            <td>{{ $emisora->descripcion_remoto }}</td>
        </tr>
        <tr>
            <td><strong>Utiliza Perifoneo:</strong></td>
            <td>{{ $emisora->utiliza_perifoneo == 1 ? 'Si' : 'No' }}</td>
            <td><strong>Tarifa Perifoneo:</strong></td>
            <td>{{ $emisora->tarifa_perifoneo }}</td>
        </tr>
        <tr>
            <td><strong>Tiempo del Perifoneo:</strong></td>
            <td>{{ $emisora->tiempo_perifoneo }}</td>
            <td><strong>Descripción del Perifoneo:</strong></td>
            <td>{{ $emisora->descripcion_perifoneo }}</td>
        </tr>
        <tr>
            <td><strong>Web:</strong></td>
            <td>{{ $emisora->web }}</td>
            <td><strong>Clase de Pauta:</strong></td>
            <td>{{ $emisora->clase_pauta }}</td>
        </tr>
        <tr>
            <td><strong>Licencia Funcionamiento:</strong></td>
            <td>{{ $emisora->licencia_funcionamiento }}</td>
            <td><strong>Afiliación:</strong></td>
            <td>{{ $emisora->tipoAfiliacione->name }}</td>
        </tr>
        <tr>
            <td><strong>Cantidad Mínima:</strong></td>
            <td>{{ $emisora->cantidad_minima }}</td>
            <td><strong>Iva:</strong></td>
            <td>{{ $emisora->iva == 1 ? 'Si' : 'No' }}</td>
        </tr>
        <tr>
            <td><strong>Nombre Periódico:</strong></td>
            <td>{{ $emisora->nombre_periodico }}</td>
            <td><strong>Nombre Canal Televisión:</strong></td>
            <td>{{ $emisora->nombre_canal_television }}</td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <thead>
        <tr>
            <th colspan="4">Contactos</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Facebook:</strong></td>
            <td>{{ $emisora->facebook }}</td>
            <td><strong>Instagram:</strong></td>
            <td>{{ $emisora->instagram }}</td>
        </tr>
        <tr>
            <td><strong>Tiktok:</strong></td>
            <td>{{ $emisora->tiktok }}</td>
            <td><strong>Email:</strong></td>
            <td>{{ $emisora->email }}</td>
        </tr>
        <tr>
            <td><strong>Email 2:</strong></td>
            <td>{{ $emisora->email2 }}</td>
            <td><strong>Email 3:</strong></td>
            <td>{{ $emisora->email3 }}</td>
        </tr>
        <tr>
            <td><strong>Teléfono:</strong></td>
            <td>{{ $emisora->telefono1 }}</td>
            <td><strong>Celular:</strong></td>
            <td>{{ $emisora->celular }}</td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <thead>
        <tr>
            <th colspan="4">Responsables</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>Gerente:</strong></td>
            <td>{{ $emisora->gerente }}</td>
            <td><strong>Teléfono Gerente:</strong></td>
            <td>{{ $emisora->telefono_gerente }}</td>
        </tr>
        <tr>
            <td><strong>Director Noticias:</strong></td>
            <td>{{ $emisora->director_noticias }}</td>
            <td><strong>Teléfono Director Noticias:</strong></td>
            <td>{{ $emisora->telefono_director_noticias }}</td>
        </tr>
        <tr>
            <td><strong>Encargado de Pauta:</strong></td>
            <td>{{ $emisora->encargado_pauta }}</td>
            <td><strong>Teléfono Encargado de Pauta:</strong></td>
            <td>{{ $emisora->telefono_encargado_pauta }}</td>
        </tr>
        <tr>
            <td><strong>Representante Legal:</strong></td>
            <td>{{ $emisora->representante_legal }}</td>
            <td><strong>Teléfono Representante Legal:</strong></td>
            <td>{{ $emisora->telefono_representante_legal }}</td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <thead>
        <tr>
            <th>Observaciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $emisora->observaciones }}</td>
        </tr>
    </tbody>
</table>

<br>

<table>
    <thead>
        <tr>
            <th colspan="2">Coberturas</th>
        </tr>
        <tr>
            <th>Municipio</th>
            <th>Departamento</th>
        </tr>
    </thead>
    <tbody>
        @forelse($coberturas as $cobertura)
            <tr>
                <td>{{ $cobertura->municipio->name }}</td>
                <td>{{ $cobertura->municipio->estado->name }}</td>
            </tr>
        @empty
            <tr><td colspan="2">No hay coberturas registradas.</td></tr>
        @endforelse
    </tbody>
</table>

<br>

<table>
    <thead>
        <tr>
            <th colspan="2">Fiestas</th>
        </tr>
        <tr>
            <th>Nombre</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @forelse($fiestas as $fiesta)
            <tr>
                <td>{{ $fiesta->nombre }}</td>
                <td>{{ $fiesta->fecha }}</td>
            </tr>
        @empty
            <tr><td colspan="2">No hay fiestas registradas.</td></tr>
        @endforelse
    </tbody>
</table>

<br>

<table>
    <thead>
        <tr>
            <th>Nombre Programa</th>
            <th>Locutor</th>
            <th>Tipo</th>
            <th>Horario</th>
            <th>Tarifa</th>
            <th>Venta</th>
            <th>Días</th>
        </tr>
    </thead>
    <tbody>
        @forelse($programas as $programa)
            <tr>
                <td>{{ $programa->nombre_programa }}</td>
                <td>{{ $programa->nombre_locutor }}</td>
                <td>{{ $programa->tipoPrograma->name }}</td>
                <td>{{ $programa->horario }}</td>
                <td>{{ $programa->costo }}</td>
                <td>{{ $programa->venta }}</td>
                <td>
                    <small>
                        {{ $programa->lunes ? 'LU ' : '' }}
                        {{ $programa->martes ? 'MA ' : ''}}
                        {{ $programa->miercoles ? 'MI ' : ''}}
                        {{ $programa->jueves ? 'JU ' : ''}}
                        {{ $programa->viernes ? 'VI ' : ''}}
                        {{ $programa->sabado ? 'SA ' : ''}}
                        {{ $programa->domingo ? 'DO' : ''}}
                    </small>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">No hay programas registrados.</td></tr>
        @endforelse
    </tbody>
</table>