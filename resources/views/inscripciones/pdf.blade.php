<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitud de Admisión #{{ $admission->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2 { text-align: center; color: #333; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h2>Solicitud de Admisión #{{ $admission->id }}</h2>

    <h3>Datos Personales</h3>
    <table>
        <tr><th>Nombre</th><td>{{ $admission->nombre ?? 'No rellenado' }} {{ $admission->apellido ?? 'No rellenado' }}</td></tr>
        <tr><th>Fecha de Nacimiento</th><td>{{ $admission->fecha_nacimiento ?? 'No rellenado' }}</td></tr>
        <tr><th>Documento</th><td>{{ $admission->tipo_documento ?? 'No rellenado' }} - {{ $admission->documento ?? 'No rellenado' }}</td></tr>
        <tr><th>Dirección</th><td>{{ $admission->direccion ?? 'No rellenado' }}</td></tr>
        <tr><th>Código Postal</th><td>{{ $admission->codigo_postal ?? 'No rellenado' }}</td></tr>
        <tr><th>Ciudad</th><td>{{ $admission->ciudad ?? 'No rellenado' }}</td></tr>
        <tr><th>Provincia</th><td>{{ $admission->provincia ?? 'No rellenado' }}</td></tr>
        <tr><th>País</th><td>{{ $admission->pais ?? 'No rellenado' }}</td></tr>
        <tr><th>Email</th><td>{{ $admission->email ?? 'No rellenado' }}</td></tr>
        <tr><th>Teléfono</th><td>{{ $admission->numero_telefono ?? 'No rellenado' }}</td></tr>
    </table>

    <h3>Datos Académicos</h3>
    <table>
        <tr><th>Carrera de Interés</th><td>{{ $admission->carrera_interes ?? 'No rellenado' }}</td></tr>
        <tr><th>Año de Estudio</th><td>{{ $admission->anio_estudio ?? 'No rellenado' }}</td></tr>
        <tr><th>Nivel Secundario</th><td>{{ $admission->nivel_secundario ?? 'No rellenado' }}</td></tr>
    </table>

    <h3>Datos de Salud</h3>
    <table>
        <tr><th>Grupo Sanguíneo</th><td>{{ $admission->grupo_sanguineo ?? 'No rellenado' }} {{ $admission->factor_rh ?? '' }}</td></tr>
        <tr><th>Obra Social</th><td>{{ $admission->obra_social ?? 'No rellenado' }}</td></tr>
        <tr><th>Número de Afiliado</th><td>{{ $admission->nro_afiliado ?? 'No rellenado' }}</td></tr>
        <tr><th>Problema de Salud</th><td>{{ $admission->problema_salud ? 'Sí' : 'No' }}</td></tr>
        <tr><th>Detalles</th><td>{{ $admission->detalle_problema_salud ?? 'Ninguno' }}</td></tr>
    </table>

    <h3>Datos Familiares</h3>
    <table>
        <tr><th>Nombre del Padre</th><td>{{ $admission->padre_nombre ?? 'No rellenado' }} {{ $admission->padre_apellido ?? '' }}</td></tr>
        <tr><th>Nombre de la Madre</th><td>{{ $admission->madre_nombre ?? 'No rellenado' }} {{ $admission->madre_apellido ?? '' }}</td></tr>
        <tr><th>Responsable Financiero</th><td>{{ $admission->resp_financiero_nombre ?? 'No rellenado' }} {{ $admission->resp_financiero_apellido ?? '' }}</td></tr>
    </table>

    <h3>Estado de la Inscripción</h3>
    <table>
        <tr>
            <th>Estado</th>
            <td>
                @if ($admission->estado == 'Pendiente')
                    <span style="color: gray;">Pendiente</span>
                @elseif ($admission->estado === 'En Observación')
                    <span style="color: orange;">En Observación</span>
                @elseif ($admission->estado === 'Rechazada')
                    <span style="color: red;">Rechazada</span>
                @else
                    <span style="color: green;">Aprobada</span>
                @endif
            </td>
        </tr>
    </table>

    <h3>Documentos Adjuntados</h3>
    <ul>
        @if($admission->user->documentos->count() > 0)
            @foreach($admission->user->documentos as $documento)
                <li>{{ $documento->descripcion ?? 'Sin descripción' }} - {{ $documento->archivo->nombre ?? 'Archivo no encontrado' }}</li>
            @endforeach
        @else
            <p>No hay documentos adjuntados.</p>
        @endif
    </ul>

</body>
</html>
