<h2>Nueva Solicitud de Admisión</h2>
<p>Se ha recibido una nueva solicitud de admisión en la plataforma.</p>

<p><strong>Nombre del Aspirante:</strong> {{ $admission->nombre }} {{ $admission->apellido }}</p>
<p><strong>Carrera de Interés:</strong> {{ ucfirst(str_replace('_', ' ', $admission->carrera_interes)) }}</p>
<p><strong>Año de Estudio:</strong> {{ $admission->anio_estudio }}</p>

<p>Puedes revisar más detalles accediendo a la plataforma.</p>
