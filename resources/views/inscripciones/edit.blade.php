<x-form method="POST" action="{{ route('inscripciones.update', $alumno->id) }}">
    @csrf
    @method('PUT')

<div x-data="{ currentSection: 1 }">

        <!-- Sección 1 -->
        <div x-show="currentSection === 1">
            <x-slot name="section1">
                <h2 class="text-xl font-bold text-blue-800 mb-4">DATOS DEL SOLICITANTE</h2>


                <!-- Apellido y Nombres -->
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <x-input-label for="apellido" :value="__('Apellido')" />
                        <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido"
                            value="{{ old('apellido', $alumno->apellido) }}" required />
                    </div>
                    <div class="flex-1">
                        <x-input-label for="nombre" :value="__('Nombres')" />
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                            value="{{ old('nombre', $alumno->nombre) }}" required />
                    </div>
                </div>

                <!-- Fecha de Nacimiento y Edad -->
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                        <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento"
                            value="{{ old('fecha_nacimiento', $alumno->fecha_nacimiento) }}" required />
                    </div>
                    <div class="flex-1">
                        <x-input-label for="edad" :value="__('Edad')" />
                        <x-text-input id="edad" class="block mt-1 w-full" type="number" name="edad"
                            value="{{ old('edad', $alumno->edad) }}" required />
                    </div>
                </div>

                <!-- Lugar de nacimiento, Provincia y País -->
                <div class="grid grid-cols-3 gap-4 mb-4">
                    <div>
                        <x-input-label for="lugar_nacimiento" :value="__('Lugar de nacimiento')" />
                        <x-text-input id="lugar_nacimiento" class="block mt-1 w-full" type="text" name="lugar_nacimiento"
                            value="{{ old('lugar_nacimiento', $alumno->lugar_nacimiento) }}" required />
                    </div>
                    <div>
                        <x-input-label for="provincia_nacimiento" :value="__('Provincia')" />
                        <x-text-input id="provincia_nacimiento" class="block mt-1 w-full" type="text" name="provincia_nacimiento"
                            value="{{ old('provincia_nacimiento', $alumno->provincia_nacimiento) }}" required />
                    </div>
                    <div>
                        <x-input-label for="pais_nacimiento" :value="__('País')" />
                        <x-text-input id="pais_nacimiento" class="block mt-1 w-full" type="text" name="pais_nacimiento"
                            value="{{ old('pais_nacimiento', $alumno->pais_nacimiento) }}" required />
                    </div>
                </div>

                <!-- Documento tipo y Número -->
                <div class="flex gap-4 mb-4">
                    <div>
                        <x-input-label for="tipo_documento" :value="__('Documento tipo')" />
                        <select id="tipo_documento" name="tipo_documento" class="block mt-1 w-full">
                            <option value="Pasaporte" @selected(old('tipo_documento', $alumno->tipo_documento) == 'Pasaporte')>Pasaporte</option>
                            <option value="DNI" @selected(old('tipo_documento', $alumno->tipo_documento) == 'DNI')>DNI</option>
                        </select>
                    </div>
                    <div>
                        <x-input-label for="documento" :value="__('Nº')" />
                        <x-text-input id="documento" class="block mt-1 w-full" type="text" name="documento"
                            value="{{ old('documento', $alumno->documento) }}" required />
                    </div>
                </div>

                <!-- Sexo -->
                <div class="mb-4">
                    <x-input-label :value="__('Sexo')" />
                    <div class="flex items-center gap-4 mt-1">
                        <label class="flex items-center">
                            <input type="radio" name="genero" value="M" class="mr-2"
                                @checked(old('genero', $alumno->genero) == 'M')> M
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="genero" value="F" class="mr-2"
                                @checked(old('genero', $alumno->genero) == 'F')> F
                        </label>
                    </div>
                </div>

                <!-- Domicilio -->
                <div class="mb-4">
                    <x-input-label for="direccion" :value="__('Domicilio Calle')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                        value="{{ old('direccion', $alumno->direccion) }}" required />
                </div>

                <!-- Teléfonos y Correo Electrónico -->
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <x-input-label for="telefono_fijo" :value="__('Teléfono fijo')" />
                        <x-text-input id="telefono_fijo" class="block mt-1 w-full" type="text" name="telefono_fijo"
                            value="{{ old('telefono_fijo', $alumno->telefono_fijo) }}" required />
                    </div>
                    <div class="flex-1">
                        <x-input-label for="numero_telefono" :value="__('Teléfono celular')" />
                        <x-text-input id="numero_telefono" class="block mt-1 w-full" type="text" name="numero_telefono"
                            value="{{ old('numero_telefono', $alumno->numero_telefono) }}" required />
                    </div>
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Correo electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    value="{{ old('email', $alumno->email) }}" required />
                </div>
                <div class="mb-4">
                    <x-input-label for="religion" :value="__('Religión que profesa')" />
                    <x-text-input id="religion" class="block mt-1 w-full" type="text" name="religion"
                        value="{{ old('religion', $alumno->religion) }}" required />
                </div>

                <div class="flex gap-4 mb-4">
                    <!-- Es Adventista -->
                    <div>
                        <x-input-label :value="__('¿Es Adventista del 7mo Día?')" />
                        <div class="flex items-center gap-4 mt-1">
                            <label class="flex items-center">
                                <input type="radio" name="adventista" value="1" class="mr-2"
                                    @checked(old('adventista', $alumno->adventista) == 1)> Sí
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="adventista" value="0" class="mr-2"
                                    @checked(old('adventista', $alumno->adventista) == 0)> No
                            </label>
                        </div>
                    </div>

                    <!-- Está Bautizado -->
                    <div>
                        <x-input-label :value="__('¿Está bautizado?')" />
                        <div class="flex items-center gap-4 mt-1">
                            <label class="flex items-center">
                                <input type="radio" name="bautizado" value="1" class="mr-2"
                                    @checked(old('bautizado', $alumno->bautizado) == 1)> Sí
                            </label>
                            <label class="flex items-center">
                                <input type="radio" name="bautizado" value="0" class="mr-2"
                                    @checked(old('bautizado', $alumno->bautizado) == 0)> No
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Iglesia a la que asiste -->
                <div class="mb-4">
                    <x-input-label for="iglesia" :value="__('¿A qué iglesia asiste?')" />
                    <x-text-input id="iglesia" class="block mt-1 w-full" type="text" name="iglesia"
                        value="{{ old('iglesia', $alumno->iglesia) }}" required />
                </div>

                <!-- Estado Civil -->
                <div class="mb-4">
                    <x-input-label :value="__('Estado civil')" />
                    <div class="flex items-center gap-4 mt-1">
                        <label class="flex items-center">
                            <input type="radio" name="estado_civil" value="soltero" class="mr-2"
                            @checked(old('estado_civil', $alumno->estado_civil) == 'soltero')> Soltero
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="estado_civil" value="casado" class="mr-2"
                            @checked(old('estado_civil', $alumno->estado_civil) == 'casado')> Casado
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="estado_civil" value="viudo" class="mr-2"
                            @checked(old('estado_civil', $alumno->estado_civil) == 'viudo')> Viudo
                        </label>
                    </div>
                </div>

                <!-- Número de CUIL -->
                <div class="mb-4">
                    <x-input-label for="cuil" :value="__('N° de CUIL')" />
                    <x-text-input id="cuil" class="block mt-1 w-full" type="text" name="cuil"
                    value="{{ old('cuil', $alumno->cuil) }}" required />
                </div>
                <!-- Botón para guardar -->
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">
                    Guardar Cambios
                </button>
            </x-slot>
        </div>


        <!-- Sección 2 -->
<!-- Sección 2 -->
<div x-show="currentSection === 2">
    <x-slot name="section2">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg mx-auto">
            <h2 class="text-lg font-bold text-blue-800 text-center">CARRERA Y AÑO DE ESTUDIO AL QUE DESEA INGRESAR EL SOLICITANTE</h2>

            <div class="space-y-4 mt-4">
                <!-- Selección de carrera -->
                <div>
                    <label for="carrera_interes" class="block font-medium text-gray-700">Selecciona tu carrera</label>
                    <select name="carrera_interes" id="carrera_interes" required
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option value="">Seleccione una opción</option>
                        <option value="educacion_inicial" @selected(old('carrera_interes', $alumno->carrera_interes) == "educacion_inicial")>Profesorado de Educación Inicial</option>
                        <option value="educacion_primaria" @selected(old('carrera_interes', $alumno->carrera_interes) == "educacion_primaria")>Profesorado de Educación Primaria</option>
                        <option value="educacion_matematica" @selected(old('carrera_interes', $alumno->carrera_interes) == "educacion_matematica")>Profesorado de Educación Secundaria en Matemática</option>
                        <option value="musica" @selected(old('carrera_interes', $alumno->carrera_interes) == "musica")>Profesorado de Música</option>
                        <option value="analista_sistemas" @selected(old('carrera_interes', $alumno->carrera_interes) == "analista_sistemas")>Técnico Superior Analista de Sistemas</option>
                        <option value="contable" @selected(old('carrera_interes', $alumno->carrera_interes) == "contable")>Técnico Superior Contable Administrativo</option>
                        <option value="enfermeria" @selected(old('carrera_interes', $alumno->carrera_interes) == "enfermeria")>Técnico Superior en Enfermería</option>
                    </select>
                </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const carreraSelect = document.getElementById("carrera_interes");
                        const anioSelect = document.getElementById("anio_estudio");

                        const tecnicaturas = ["analista_sistemas", "contable", "enfermeria"];
                        const anioGuardado = "{{ old('anio_estudio', $alumno->anio_estudio) }}"; // Carga desde Laravel

                        function actualizarOpcionesAnio() {
                            anioSelect.innerHTML = ""; // Limpiar opciones

                            let maxAnio = tecnicaturas.includes(carreraSelect.value) ? 3 : 4;

                            for (let i = 1; i <= maxAnio; i++) {
                                let option = document.createElement("option");
                                option.value = i;
                                option.textContent = `${i}° Año`;

                                // Si coincide con el año guardado, se marca como seleccionado
                                if (i == anioGuardado) {
                                    option.selected = true;
                                }

                                anioSelect.appendChild(option);
                            }
                        }

                        carreraSelect.addEventListener("change", actualizarOpcionesAnio);
                        actualizarOpcionesAnio();
                    });
                </script>
                <!-- Selección del año de estudio (dinámico) -->
                <div>
                    <label for="anio_estudio" class="block font-medium text-gray-700">Selecciona el año</label>
                    <select name="anio_estudio" id="anio_estudio" required
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option value="1" @selected(old('anio_estudio', $alumno->anio_estudio) == "1")>1° Año</option>
                        <option value="2" @selected(old('anio_estudio', $alumno->anio_estudio) == "2°")>2° Año</option>
                        <option value="3" @selected(old('anio_estudio', $alumno->anio_estudio) == "3")>3° Año</option>
                        <option value="4" @selected(old('anio_estudio', $alumno->anio_estudio) == "4")>4° Año</option>
                    </select>
                </div>

                <!-- Nivel Secundario -->
                <div>
                    <label for="nivel_secundario" class="block font-medium text-gray-700">NIVEL DE SECUNDARIO</label>
                    <select name="nivel_secundario" id="nivel_secundario" required
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option value="">Seleccione una opción</option>
                        <option value="completo" @selected(old('nivel_secundario', $alumno->nivel_secundario) == "completo")>Nivel Secundario completo</option>
                        <option value="proceso" @selected(old('nivel_secundario', $alumno->nivel_secundario) == "proceso")>Nivel Secundario en proceso</option>
                        <option value="incompleto" @selected(old('nivel_secundario', $alumno->nivel_secundario) == "incompleto")>Nivel Secundario incompleto (Solicitar Protocolo de Admisión para mayores)</option>
                    </select>
                </div>
            </script>
        </div>
        </div>
    </x-slot>
</div>


        <!-- Sección 3 -->
        <div x-show="currentSection === 3">
            <x-slot name="section3">
                <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg mx-auto">
                    <h1>INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
                    <h2>VIDA ESTUDIANTIL</h2>

                    <!-- Mensaje de advertencia -->
                    <div class="p-4 bg-gray-100 border border-gray-400 mb-4">
                        <strong>IMPORTANTE:</strong> Los Estudiantes solteros menores de 20 años que no residan en el hogar paterno o familiares directos (abuelos o hermanos con familia constituida) deberán vivir en las residencias del ISAM (al momento de la matriculación deberán tener 20 años cumplidos).
                    </div>

                   <!-- Opciones de hospedaje -->
<div class="mb-4">
    <label>
        <input type="radio" name="hospedaje" value="yes"
            @checked(old('hospedaje', $alumno->hospedaje) == 'yes')>
        Solicito hospedarme en las residencias del ISAM (Se admite el ingreso como estudiante residente hasta los 24 años).
    </label>
    <br>
    <label>
        <input type="radio" name="hospedaje" value="no"
            @checked(old('hospedaje', $alumno->hospedaje) == 'no')>
        No solicito hospedarme en las residencias del ISAM.
    </label>
</div>

<!-- Opciones adicionales si no se hospeda en el ISAM -->
<div x-show="hospedaje === 'no'" class="p-4 bg-gray-50 border border-gray-400">
    <div class="mb-2">
        <label>
            <input type="radio" name="edad_adicional" value="mayor_20"
                @checked(old('edad_adicional', $alumno->edad_adicional) == 'mayor_20')>
            Soy mayor de 20 años
        </label>
    </div>
    <div class="mb-2">
        <label>
            <input type="radio" name="edad_adicional" value="menor_20"
                @checked(old('edad_adicional', $alumno->edad_adicional) == 'menor_20')>
            Soy menor de 20 años y viviré con:
        </label>
    </div>

    <!-- Campos adicionales -->
    <div class="grid grid-cols-1 gap-4 mt-4">
        <div>
            <x-input-label for="nombre_apellido" :value="__('Nombre y Apellido')" />
            <x-text-input id="nombre_apellido" class="block mt-1 w-full" type="text" name="nombre_apellido"
                value="{{ old('nombre_apellido', $alumno->nombre_apellido) }}" />
        </div>
        <div>
            <x-input-label for="telefono" :value="__('Teléfono fijo')" />
            <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono"
                value="{{ old('telefono', $alumno->telefono) }}" />
        </div>
        <div>
            <x-input-label for="celular" :value="__('Celular')" />
            <x-text-input id="celular" class="block mt-1 w-full" type="text" name="celular"
                value="{{ old('celular', $alumno->celular) }}" />
        </div>
        <div>
            <x-input-label for="direccion_tutor" :value="__('Dirección')" />
            <x-text-input id="direccion_tutor" class="block mt-1 w-full" type="text" name="direccion_tutor"
                value="{{ old('direccion_tutor', $alumno->direccion_tutor) }}" />
        </div>
        <div>
            <x-input-label for="email_tutor" :value="__('Correo electrónico')" />
            <x-text-input id="email_tutor" class="block mt-1 w-full" type="email" name="email_tutor"
                value="{{ old('email_tutor', $alumno->email_tutor) }}" />
        </div>
        <div>
            <x-input-label for="vinculo_familiar" :value="__('¿Cuál es el vínculo familiar?')" />
            <x-text-input id="vinculo_familiar" class="block mt-1 w-full" type="text" name="vinculo_familiar"
                value="{{ old('vinculo_familiar', $alumno->vinculo_familiar) }}" />
        </div>

                        </div>
                    </div>
                </div>
            </x-slot>
        </div>
        </div>
     <!-- Sección 4 -->
        <div x-show="currentSection === 4">
            <x-slot name="section4">
                <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg mx-auto">
                    <h1>INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
                <h2>PROGRAMA DE FORMACIÓN PROFESIONAL</h2>

                <!-- Mensaje de advertencia -->
                <div class="p-4 bg-gray-100 border border-gray-400 mb-4">
                    <strong>PLANES DE BECAS:</strong>Para acceder a este programa. debe cumplir con los siguientes requisitos, completar y enviar todos los formularios correspondientes, junto con la planilla de inscripcion, luego debe esperar la respuesta de aceptacion.
                </div>

                <!-- Opciones de becas -->
<div class="mb-4">
    <label>
        <input type="checkbox" name="beca_parcial" value="yes"
            @checked(old('beca_parcial', $alumno->beca_parcial ?? '') == 'yes')>
        Solicito inscribirme al programa de formación profesional a contra turno del cursado de clases (Plan de Beca parcial).
    </label>
    <br>
    <label>
        <input type="checkbox" name="beca_total" value="yes"
            @checked(old('beca_total', $alumno->beca_total ?? '')== 'yes')>
        Solicito inscribirme al programa de formación profesional durante todo el año (Beca total).
    </label>
</div>

<!-- Préstamo de honor -->
<label>
    <input type="checkbox" name="prestamo_honor" value="yes"
        @checked(old('prestamo_honor', $alumno->prestamo_honor ?? '') == 'yes')>
    Préstamo de honor.
</label>

            </div>
        </x-slot>
        </div>
        </div>

        <!-- Sección 5 -->

        <div x-show="currentSection === 5">
            <x-slot name="section5">
                <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg mx-auto">
                    <h1>INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
                <h2>¿COMO SUPO ACERCA DEL ISAM?</h2>
                <!-- Opciones -->
                <div class="mb-4">
                    @php
                        // Obtener los valores guardados en la base de datos como un array
                        $como_supo = old('como_supo_isam', json_decode($alumno->como_supo_isam, true) ?? []);
                    @endphp

                    @foreach(['alumno_promotor', 'iglesia', 'familiares', 'amigos', 'folleto', 'instituto_adventista', 'otro'] as $opcion)
                        <label>
                            <input type="checkbox" name="como_supo_isam[]" value="{{ $opcion }}"
                                @if(is_array($como_supo) && in_array($opcion, $como_supo)) checked @endif>
                            {{ ucfirst(str_replace('_', ' ', $opcion)) }}
                        </label>
                        <br>
                    @endforeach
                </div>

                <!-- Nombre del alumno promotor -->
                <div class="p-4 bg-gray-100 border border-gray-400 mb-4">
                    Si quien le informó es un alumno del nivel superior del ISAM, por favor denos el nombre y apellido.
                </div>
                <x-input-label for="nombre_recomendado" :value="__('Nombre y Apellido')" />
                <x-text-input id="nombre_recomendado" class="block mt-1 w-full" type="text" name="nombre_recomendado"
                    value="{{ old('nombre_recomendado', $alumno->nombre_recomendado) }}" />

                <!-- Razón de estudio -->
                <div class="p-4 bg-gray-100 border border-gray-400 mb-4">
                    ¿Cuáles son las razones por las que eligió el ISAM para estudiar?
                </div>
                <x-text-input id="razon_estudio" class="block mt-1 w-full" type="text" name="razon_estudio"
                    value="{{ old('razon_estudio', $alumno->razon_estudio) }}" />

            </div>
        </x-slot>
        </div>
        </div>

        <!-- Sección 6 -->
    <div x-show="currentSection === 6">
    <x-slot name="section6">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg mx-auto">
            <h1>INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
            <h2>SALUD DEL SOLICITANTE</h2>

            <!-- Grupo Sanguíneo -->
            <div class="form-group">
                <label for="grupo_sanguineo">Grupo Sanguíneo</label>
                <input type="text" class="form-control" id="grupo_sanguineo" name="grupo_sanguineo"
                    value="{{ old('grupo_sanguineo', $alumno->grupo_sanguineo) }}" placeholder="Grupo Sanguíneo" required>
            </div>

            <!-- Factor RH -->
            <div class="form-group">
                <label for="factor_rh">Factor RH</label>
                <input type="text" class="form-control" id="factor_rh" name="factor_rh"
                    value="{{ old('factor_rh', $alumno->factor_rh) }}" placeholder="Factor RH" required>
            </div>

            <!-- Problema de salud -->
            <div class="form-group">
                <label>¿Tiene algún problema de salud?</label>
                <div>
                    <label><input type="radio" name="problema_salud" value="1"
                        @checked(old('problema_salud', $alumno->problema_salud) == 1)> Sí</label>
                    <label><input type="radio" name="problema_salud" value="0"
                        @checked(old('problema_salud', $alumno->problema_salud) == 0)> No</label>
                </div>
                <input type="text" class="form-control" name="detalle_problema_salud"
                    value="{{ old('detalle_problema_salud', $alumno->detalle_problema_salud) }}" placeholder="¿Cuál?">
            </div>

            <!-- Problema que impida actividad física -->
            <div class="form-group">
                <label>¿Tiene algún problema que le impida realizar actividad física o manual?</label>
                <div>
                    <label><input type="radio" name="limitacion_fisica" value="1"
                        @checked(old('limitacion_fisica', $alumno->limitacion_fisica) == 1)> Sí</label>
                    <label><input type="radio" name="limitacion_fisica" value="0"
                        @checked(old('limitacion_fisica', $alumno->limitacion_fisica) == 0)> No</label>
                </div>
                <input type="text" class="form-control" name="detalle_limitacion_fisica"
                    value="{{ old('detalle_limitacion_fisica', $alumno->detalle_limitacion_fisica) }}" placeholder="¿Cuál?">
            </div>

            <!-- Tratamiento médico -->
            <div class="form-group">
                <label>¿Está bajo tratamiento médico?</label>
                <input type="text" class="form-control" name="tratamiento_medico"
                    value="{{ old('tratamiento_medico', $alumno->tratamiento_medico) }}" placeholder="¿Cuál?">
            </div>

            <!-- Obra Social -->
            <div class="form-group">
                <label>Tiene obra social</label>
                <input type="text" class="form-control" name="obra_social"
                    value="{{ old('obra_social', $alumno->obra_social) }}" placeholder="¿Cuál?">
            </div>

            <!-- Número de Afiliado -->
            <div class="form-group">
                <label>N° de afiliado</label>
                <input type="text" class="form-control" name="nro_afiliado"
                    value="{{ old('nro_afiliado', $alumno->nro_afiliado) }}" placeholder="Número">
            </div>

            <!-- Tratamiento por consumo de sustancias -->
            <div class="form-group">
                <label>¿Estoy recibiendo o recibí tratamiento de rehabilitación por consumo de sustancias adictivas?</label>
                <div>
                    <label><input type="radio" name="rehabilitacion_sustancias" value="Nunca"
                        @checked(old('rehabilitacion_sustancias', $alumno->rehabilitacion_sustancias) == "Nunca")> Nunca</label><br>
                    <label><input type="radio" name="rehabilitacion_sustancias" value="No en el último año"
                        @checked(old('rehabilitacion_sustancias', $alumno->rehabilitacion_sustancias) == "No en el último año")> No en el último año</label><br>
                    <label><input type="radio" name="rehabilitacion_sustancias" value="Alguna vez este año"
                        @checked(old('rehabilitacion_sustancias', $alumno->rehabilitacion_sustancias) == "Alguna vez este año")> Alguna vez este año</label>
                </div>
            </div>

            <!-- Tratamiento psicológico -->
            <div class="form-group">
                <label>¿Estoy recibiendo o recibí tratamiento psicológico?</label>
                <div>
                    <label><input type="radio" name="tratamiento_psicologico" value="Nunca"
                        @checked(old('tratamiento_psicologico', $alumno->tratamiento_psicologico) == "Nunca")> Nunca</label><br>
                    <label><input type="radio" name="tratamiento_psicologico" value="No en el último año"
                        @checked(old('tratamiento_psicologico', $alumno->tratamiento_psicologico) == "No en el último año")> No en el último año</label><br>
                    <label><input type="radio" name="tratamiento_psicologico" value="Alguna vez este año"
                        @checked(old('tratamiento_psicologico', $alumno->tratamiento_psicologico) == "Alguna vez este año")> Alguna vez este año</label>
                </div>
            </div>

        </div>

    </x-slot>
    </div>

    <!-- Sección 7 -->
    <div x-show="currentSection === 7">
    <x-slot name="section7">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg mx-auto">
            <h1>INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
            <h2>PADRES DEL SOLICITANTE</h2>

            <!-- PADRE -->
            <h2>PADRE</h2>
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="padre_apellido" :value="__('Apellido')" />
                    <x-text-input id="padre_apellido" class="block mt-1 w-full" type="text" name="padre_apellido"
                        value="{{ $alumno['padre_apellido']}}" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="padre_nombre" :value="__('Nombres')" />
                    <x-text-input id="padre_nombre" class="block mt-1 w-full" type="text" name="padre_nombre"
                    value="@php echo $alumno->padre_nombre; @endphp" required />



                </div>
            </div>

            <!-- Domicilio -->
            <div class="mb-4">
                <x-input-label for="padre_direccion" :value="__('Dirección')" />
                <x-text-input id="padre_direccion" class="block mt-1 w-full" type="text" name="padre_direccion"
                    value="{{ old('padre_direccion', $alumno->padre_direccion) }}" required />
            </div>

            <!-- Código Postal, Localidad, Provincia, País -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="padre_cp" :value="__('CP')" />
                    <x-text-input id="padre_cp" class="block mt-1 w-full" type="text" name="padre_cp"
                        value="{{ old('padre_cp', $alumno->padre_cp) }}" required />
                </div>
                <div>
                    <x-input-label for="padre_localidad" :value="__('Localidad')" />
                    <x-text-input id="padre_localidad" class="block mt-1 w-full" type="text" name="padre_localidad"
                        value="{{ old('padre_localidad', $alumno->padre_localidad) }}" required />
                </div>
                <div>
                    <x-input-label for="padre_provincia" :value="__('Provincia')" />
                    <x-text-input id="padre_provincia" class="block mt-1 w-full" type="text" name="padre_provincia"
                        value="{{ old('padre_provincia', $alumno->padre_provincia) }}" required />
                </div>
                <div>
                    <x-input-label for="padre_pais" :value="__('País')" />
                    <x-text-input id="padre_pais" class="block mt-1 w-full" type="text" name="padre_pais"
                        value="{{ old('padre_pais', $alumno->padre_pais) }}" required />
                </div>
            </div>

            <!-- Teléfono y Correo -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="padre_telefono" :value="__('Teléfono celular')" />
                    <x-text-input id="padre_telefono" class="block mt-1 w-full" type="text" name="padre_telefono"
                        value="{{ old('padre_telefono', $alumno->padre_telefono) }}" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="padre_email" :value="__('Correo electrónico')" />
                    <x-text-input id="padre_email" class="block mt-1 w-full" type="email" name="padre_email"
                        value="{{ old('padre_email', $alumno->padre_email) }}" required />
                </div>
            </div>

            <!-- Documento -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="padre_tipo_documento" :value="__('Tipo de Documento')" />
                    <select id="padre_tipo_documento" name="padre_tipo_documento" class="block mt-1 w-full">
                        <option value="Pasaporte" @selected(old('padre_tipo_documento', $alumno->padre_tipo_documento) == 'Pasaporte')>Pasaporte</option>
                        <option value="DNI" @selected(old('padre_tipo_documento', $alumno->padre_tipo_documento) == 'DNI')>DNI</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="padre_documento" :value="__('Nº')" />
                    <x-text-input id="padre_documento" class="block mt-1 w-full" type="text" name="padre_documento"
                        value="{{ old('padre_documento', $alumno->padre_documento) }}" required />
                </div>
            </div>

            <!-- MADRE -->
            <h2>MADRE</h2>
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="madre_apellido" :value="__('Apellido')" />
                    <x-text-input id="madre_apellido" class="block mt-1 w-full" type="text" name="madre_apellido"
                        value="{{ old('madre_apellido', $alumno->madre_apellido) }}" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="madre_nombre" :value="__('Nombres')" />
                    <x-text-input id="madre_nombre" class="block mt-1 w-full" type="text" name="madre_nombre"
                        value="{{ old('madre_nombre', $alumno->madre_nombre) }}" required />
                </div>
            </div>

            <!-- Teléfono y Correo -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="madre_telefono" :value="__('Teléfono celular')" />
                    <x-text-input id="madre_telefono" class="block mt-1 w-full" type="text" name="madre_telefono"
                        value="{{ old('madre_telefono', $alumno->madre_telefono) }}" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="madre_email" :value="__('Correo electrónico')" />
                    <x-text-input id="madre_email" class="block mt-1 w-full" type="email" name="madre_email"
                        value="{{ old('madre_email', $alumno->madre_email) }}" required />
                </div>
            </div>

            <!-- Documento -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="madre_tipo_documento" :value="__('Tipo de Documento')" />
                    <select id="madre_tipo_documento" name="madre_tipo_documento" class="block mt-1 w-full">
                        <option value="Pasaporte" @selected(old('madre_tipo_documento', $alumno->madre_tipo_documento) == 'Pasaporte')>Pasaporte</option>
                        <option value="DNI" @selected(old('madre_tipo_documento', $alumno->madre_tipo_documento) == 'DNI')>DNI</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="madre_documento" :value="__('Nº')" />
                    <x-text-input id="madre_documento" class="block mt-1 w-full" type="text" name="madre_documento"
                        value="{{ old('madre_documento', $alumno->madre_documento) }}" required />
                </div>
            </div>
        </div>

    </x-slot>
    </div>

    <!-- Sección 8 -->
    <div x-show="currentSection === 8">
    <x-slot name="section8">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg mx-auto">
            <h1>INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
            <h2>RESPONSABLE FINANCIERO</h2>

            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="resp_financiero_apellido" :value="__('Apellido')" />
                    <x-text-input id="resp_financiero_apellido" class="block mt-1 w-full" type="text" name="resp_financiero_apellido"
                        value="{{ old('resp_financiero_apellido', $alumno->resp_financiero_apellido) }}" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="resp_financiero_nombre" :value="__('Nombres')" />
                    <x-text-input id="resp_financiero_nombre" class="block mt-1 w-full" type="text" name="resp_financiero_nombre"
                        value="{{ old('resp_financiero_nombre', $alumno->resp_financiero_nombre) }}" required />
                </div>
            </div>

            <!-- Domicilio -->
            <div class="mb-4">
                <x-input-label for="resp_financiero_direccion" :value="__('Dirección')" />
                <x-text-input id="resp_financiero_direccion" class="block mt-1 w-full" type="text" name="resp_financiero_direccion"
                    value="{{ old('resp_financiero_direccion', $alumno->resp_financiero_direccion) }}" required />
            </div>

            <!-- Código Postal, Localidad, Provincia, País -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="resp_financiero_cp" :value="__('CP')" />
                    <x-text-input id="resp_financiero_cp" class="block mt-1 w-full" type="text" name="resp_financiero_cp"
                        value="{{ old('resp_financiero_cp', $alumno->resp_financiero_cp) }}" required />
                </div>
                <div>
                    <x-input-label for="resp_financiero_localidad" :value="__('Localidad')" />
                    <x-text-input id="resp_financiero_localidad" class="block mt-1 w-full" type="text" name="resp_financiero_localidad"
                        value="{{ old('resp_financiero_localidad', $alumno->resp_financiero_localidad) }}" required />
                </div>
                <div>
                    <x-input-label for="resp_financiero_provincia" :value="__('Provincia')" />
                    <x-text-input id="resp_financiero_provincia" class="block mt-1 w-full" type="text" name="resp_financiero_provincia"
                        value="{{ old('resp_financiero_provincia', $alumno->resp_financiero_provincia) }}" required />
                </div>
                <div>
                    <x-input-label for="resp_financiero_pais" :value="__('País')" />
                    <x-text-input id="resp_financiero_pais" class="block mt-1 w-full" type="text" name="resp_financiero_pais"
                        value="{{ old('resp_financiero_pais', $alumno->resp_financiero_pais) }}" required />
                </div>
            </div>

            <!-- Teléfonos y Correo Electrónico -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="resp_financiero_telefono" :value="__('Teléfono celular')" />
                    <x-text-input id="resp_financiero_telefono" class="block mt-1 w-full" type="text" name="resp_financiero_telefono"
                        value="{{ old('resp_financiero_telefono', $alumno->resp_financiero_telefono) }}" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="resp_financiero_email" :value="__('Correo electrónico')" />
                    <x-text-input id="resp_financiero_email" class="block mt-1 w-full" type="email" name="resp_financiero_email"
                        value="{{ old('resp_financiero_email', $alumno->resp_financiero_email) }}" required />
                </div>
            </div>

            <!-- Documento tipo y Número -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="resp_financiero_tipo_documento" :value="__('Tipo de Documento')" />
                    <select id="resp_financiero_tipo_documento" name="resp_financiero_tipo_documento" class="block mt-1 w-full">
                        <option value="Pasaporte" @selected(old('resp_financiero_tipo_documento', $alumno->resp_financiero_tipo_documento) == 'Pasaporte')>Pasaporte</option>
                        <option value="DNI" @selected(old('resp_financiero_tipo_documento', $alumno->resp_financiero_tipo_documento) == 'DNI')>DNI</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="resp_financiero_documento" :value="__('Nº')" />
                    <x-text-input id="resp_financiero_documento" class="block mt-1 w-full" type="text" name="resp_financiero_documento"
                        value="{{ old('resp_financiero_documento', $alumno->resp_financiero_documento) }}" required />
                </div>
            </div>

            <!-- Edad y Ocupación -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-input-label for="resp_financiero_edad" :value="__('Edad')" />
                    <x-text-input id="resp_financiero_edad" class="block mt-1 w-full" type="number" name="resp_financiero_edad"
                        value="{{ old('resp_financiero_edad', $alumno->resp_financiero_edad) }}" required />
                </div>
                <div>
                    <x-input-label for="resp_financiero_ocupacion" :value="__('Ocupación')" />
                    <x-text-input id="resp_financiero_ocupacion" class="block mt-1 w-full" type="text" name="resp_financiero_ocupacion"
                        value="{{ old('resp_financiero_ocupacion', $alumno->resp_financiero_ocupacion) }}" required />
                </div>
            </div>
        </div>

    </x-slot>
    </div>

</x-form>

