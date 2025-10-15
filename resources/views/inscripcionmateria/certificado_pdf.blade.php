<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Certificado de Materia - {{ $inscripcion->materia->nombre }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            margin: 50px;
            background-color: #f8f9fa;
            color: #333;
        }
        .certificado {
            border: 10px solid #0d6efd;
            padding: 50px;
            text-align: center;
            background: white;
            border-radius: 10px;
        }
        h1 {
            color: #0d6efd;
            font-size: 36px;
            margin-bottom: 10px;
        }
        h2 {
            margin-top: 0;
            font-size: 22px;
            color: #444;
        }
        .detalle {
            margin-top: 40px;
            font-size: 18px;
        }
        .firma {
            margin-top: 80px;
            text-align: right;
        }
        .firma p {
            border-top: 1px solid #000;
            width: 250px;
            margin-left: auto;
            font-size: 14px;
        }
        .footer {
            margin-top: 60px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="certificado">
        <img src="{{ public_path('images/logo.png') }}" alt="Logo" style="width:100px;margin-bottom:20px;">
        <h1>Certificado de Aprobación</h1>
        <h2>{{ $inscripcion->estudiante->name ?? 'Nombre no disponible' }}</h2>

        <div class="detalle">
            <p>Ha completado y aprobado satisfactoriamente la materia:</p>
            <h2><strong>{{ $inscripcion->materia->nombre ?? 'Materia no disponible' }}</strong></h2>
            <p>Año: {{ $inscripcion->materia->año ?? 'N/A' }}</p>
            <p>Fecha de aprobación: {{ $inscripcion->updated_at->format('d/m/Y') }}</p>
        </div>

        <div class="firma">
            <p>Firma del Director</p>
        </div>

        <div class="footer">
            <p>Instituto Superior de Administración y Management — ISAM</p>
            <p>Emitido el {{ now()->format('d/m/Y') }}</p>
        </div>
    </div>
</body>
</html>
