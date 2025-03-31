<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-blue-800 text-center">PLANILLA DE INSCRIPCIÓN AL NIVEL SUPERIOR</h2>

    @if(isset($admission))
        <p class="text-gray-700 text-center mt-2">
            <strong>Estado de Inscripción:</strong>
            @if ($admission->estado == 'Pendiente')
                <span class="text-yellow-600 font-semibold">En proceso</span>
            @elseif ($admission->estado == 'En Observación')
                <span class="text-orange-600 font-semibold">En Observación</span>
            @elseif ($admission->estado == 'Aprobado')
                <span class="text-green-600 font-semibold">Aprobado</span>
            @else
                <span class="text-red-600 font-semibold">Rechazado</span>
            @endif
        </p>

        <!-- ⚠️ Mensaje de Observación -->
        @if($admission->estado == 'En Observación' && !empty($admission->observaciones))
            <div class="mt-4 p-4 bg-yellow-100 border-l-4 border-yellow-500 text-yellow-900 rounded-md">
                <p class="font-semibold">🔍 Observaciones del Administrador:</p>
                <p>{{ $admission->observaciones }}</p>
            </div>
        @endif

        <div class="overflow-x-auto mt-4">
            <table class="w-full border-collapse border border-gray-300">
                <tbody>
                    <tr class="bg-gray-100">
                        <td class="border px-4 py-2 font-semibold">Nombre</td>
                        <td class="border px-4 py-2">{{ $admission->nombre }} {{ $admission->apellido }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold">Fecha de Nacimiento</td>
                        <td class="border px-4 py-2">{{ $admission->fecha_nacimiento }}</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="border px-4 py-2 font-semibold">Documento</td>
                        <td class="border px-4 py-2">{{ $admission->tipo_documento }} - {{ $admission->documento }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold">Teléfono</td>
                        <td class="border px-4 py-2">{{ $admission->numero_telefono }}</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="border px-4 py-2 font-semibold">Correo Electrónico</td>
                        <td class="border px-4 py-2">{{ $admission->email }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold">Carrera Interesada</td>
                        <td class="border px-4 py-2">{{ ucfirst(str_replace('_', ' ', $admission->carrera_interes)) }}</td>
                    </tr>
                    <tr class="bg-gray-100">
                        <td class="border px-4 py-2 font-semibold">Nivel Secundario</td>
                        <td class="border px-4 py-2">{{ ucfirst($admission->nivel_secundario) }}</td>
                    </tr>
                    <tr>
                        <td class="border px-4 py-2 font-semibold">Grupo Sanguíneo</td>
                        <td class="border px-4 py-2">{{ $admission->grupo_sanguineo }} {{ $admission->factor_rh }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- 📌 Sección para Adjuntar Documentos -->
        <div class="mt-6 p-6 bg-gray-50 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-xl font-bold text-blue-800 mb-4">Adjuntar Documentación</h3>

            @php
                $documentoMap = [
                    'DNI (Frente y Dorso)' => 'Dni',
                    'Título en Trámite' => 'Titulo tramite',
                    'Certificado de Salud' => 'Certificado salud',
                ];

                $documentos_subidos = Auth::user()->documentos->keyBy('descripcion');
                $faltanDocumentos = false;
            @endphp

            <form action="{{ route('documento.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                @foreach ($documentoMap as $label => $descripcionBD)
                    <div class="mb-6">
                        <label class="block text-gray-800 font-semibold mb-2">{{ $label }}</label>

                        @php
                            $archivo = $documentos_subidos[$descripcionBD] ?? null;
                        @endphp

                        @if($archivo)
                            <p class="text-sm text-green-600 font-semibold flex items-center">
                                ✅ <span class="ml-2">Archivo subido:</span>
                                <a href="{{ asset(str_replace('public/', 'storage/', $archivo->archivo->ruta)) }}"
                                   target="_blank" class="text-blue-600 underline ml-2">
                                    Ver {{ $label }}
                                </a>
                            </p>
                        @else
                            <input type="file" name="{{ strtolower(str_replace(' ', '_', $descripcionBD)) }}" class="w-full p-2 border rounded-md">
                            @php $faltanDocumentos = true; @endphp
                        @endif
                    </div>
                @endforeach

                @if($faltanDocumentos)
                    <div class="text-center">
                        <button type="submit"
                                class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition">
                            Subir Documentos
                        </button>
                    </div>
                @else
                    <p class="text-green-600 font-semibold text-center">✅ Todos los documentos han sido subidos.</p>
                @endif
            </form>
        </div>

        <!-- ✏️ Sección de Edición si Hay Observaciones -->
        @if($admission->estado == 'En Observación')
            <div class="mt-6 p-6 bg-gray-50 rounded-lg shadow-md border border-gray-200">
                <h3 class="text-xl font-bold text-blue-800 mb-4">🔄 Editar Información</h3>
                <p class="text-gray-700 mb-4">Hemos detectado observaciones en tu inscripción. Puedes corregir la información y reenviarla.</p>

                <a href="{{ route('inscripciones.edit', ['id' => $admission->id]) }}"
                   class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition shadow-md">
                     Editar Información
                </a>
            </div>
        @endif

    @else
        <p class="text-gray-700 text-center mb-4">No has iniciado tu inscripción.</p>
        <div class="text-center">
            <a href="{{ route('complete-profile') }}" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-md hover:bg-blue-700 transition duration-300">
                Comenzar Inscripción
            </a>
        </div>
    @endif
</div>
