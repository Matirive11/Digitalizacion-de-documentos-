<x-form>
    <div x-data="{ currentSection: 1 }">

        <!-- Sección 1 -->
        <div x-show="currentSection === 1">
            <x-slot name="section1">
                <h2 class="text-xl font-bold text-blue-800 mb-4">DATOS DEL SOLICITANTE</h2>

                <!-- Apellido y Nombres -->
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <x-input-label for="apellido" :value="__('Apellido')" />
                        <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido" required />
                    </div>
                    <div class="flex-1">
                        <x-input-label for="nombre" :value="__('Nombres')" />
                        <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" required />
                    </div>
                </div>
                <!-- Otros campos de la sección 1 (continúa tu formulario aquí) -->
                <!-- Fecha de Nacimiento y Edad -->
        <div class="flex gap-4 mb-4">
            <div class="flex-1">
                <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" required />
            </div>
            <div class="flex-1">
                <x-input-label for="edad" :value="__('Edad')" />
                <x-text-input id="edad" class="block mt-1 w-full" type="number" name="edad" required />
            </div>
        </div>

        <!-- Lugar de nacimiento, Provincia y País -->
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div>
                <x-input-label for="lugar_nacimiento" :value="__('Lugar de nacimiento')" />
                <x-text-input id="lugar_nacimiento" class="block mt-1 w-full" type="text" name="lugar_nacimiento" required />
            </div>
            <div>
                <x-input-label for="provincia_nacimiento" :value="__('Provincia')" />
                <x-text-input id="provincia_nacimiento" class="block mt-1 w-full" type="text" name="provincia_nacimiento" required />
            </div>
            <div>
                <x-input-label for="pais_nacimiento" :value="__('País')" />
                <x-text-input id="pais_nacimiento" class="block mt-1 w-full" type="text" name="pais_nacimiento" required />
            </div>
        </div>

        <!-- Documento tipo y Número -->
        <div class="flex gap-4 mb-4">
            <div>
                <x-input-label for="tipo_documento" :value="__('Documento tipo')" />
                <select id="tipo_documento" name="tipo_documento" class="block mt-1 w-full">
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="DNI">DNI</option>
                </select>
            </div>
            <div>
                <x-input-label for="documento" :value="__('Nº')" />
                <x-text-input id="documento" class="block mt-1 w-full" type="text" name="documento" required />
            </div>
        </div>

        <!-- Sexo -->
        <div class="mb-4">
            <x-input-label :value="__('Sexo')" />
            <div class="flex items-center gap-4 mt-1">
                <label class="flex items-center">
                    <input type="radio" name="genero" value="M" class="mr-2"> M
                </label>
                <label class="flex items-center">
                    <input type="radio" name="genero" value="F" class="mr-2"> F
                </label>
            </div>
        </div>

        <!-- Domicilio -->
        <div class="mb-4">
            <x-input-label for="direccion" :value="__('Domicilio Calle')" />
            <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" required />
        </div>

        <!-- Teléfonos y Correo Electrónico -->
        <div class="flex gap-4 mb-4">
            <div class="flex-1">
                <x-input-label for="telefono_fijo" :value="__('Teléfono fijo')" />
                <x-text-input id="telefono_fijo" class="block mt-1 w-full" type="text" name="telefono_fijo" required />
            </div>
            <div class="flex-1">
                <x-input-label for="numero_telefono" :value="__('Teléfono celular')" />
                <x-text-input id="numero_telefono" class="block mt-1 w-full" type="text" name="numero_telefono" required />
            </div>
        </div>
               <!-- Código Postal, Localidad, Provincia, País -->
               <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="codigo_postal" :value="__('CP')" />
                    <x-text-input id="codigo_postal" class="block mt-1 w-full" type="text" name="codigo_postal" required />
                </div>
                <div>
                    <x-input-label for="ciudad" :value="__('Localidad')" />
                    <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" required />
                </div>
                <div>
                    <x-input-label for="provincia" :value="__('Provincia')" />
                    <x-text-input id="provincia" class="block mt-1 w-full" type="text" name="provincia" required />
                </div>
                <div>
                    <x-input-label for="pais" :value="__('País')" />
                    <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais" required />
                </div>
            </div>
        <!-- Correo Electrónico -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Correo electrónico')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
        </div>

        <!-- Otros Datos -->
        <div class="mb-4">
            <x-input-label for="religion" :value="__('Religión que profesa')" />
            <x-text-input id="religion" class="block mt-1 w-full" type="text" name="religion" required />
        </div>
        <div class="flex gap-4 mb-4">
            <div>
                <x-input-label :value="__('¿Es Adventista del 7mo Día?')" />
                <div class="flex items-center gap-4 mt-1">
                    <label class="flex items-center">
                        <input type="radio" name="adventista" value="true" class="mr-2"> Sí
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="adventista" value="false" class="mr-2"> No
                    </label>
                </div>
            </div>
            <div>
                <x-input-label :value="__('¿Está bautizado?')" />
                <div class="flex items-center gap-4 mt-1">
                    <label class="flex items-center">
                        <input type="radio" name="bautizado" value="true" class="mr-2"> Sí
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="bautizado" value="false" class="mr-2"> No
                    </label>
                </div>
            </div>
        </div>
        <!-- Iglesia a la que asiste -->
        <div class="mb-4">
            <x-input-label for="iglesia" :value="__('¿A qué iglesia asiste?')" />
            <x-text-input id="iglesia" class="block mt-1 w-full" type="text" name="iglesia" required />
        </div>

        <!-- Estado Civil -->
            <div class="mb-4">
                <x-input-label :value="__('Estado civil')" />
                <div class="flex items-center gap-4 mt-1">
                    <label class="flex items-center">
                        <input type="radio" name="estado_civil" value="soltero" class="mr-2"> Soltero
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="estado_civil" value="casado" class="mr-2"> Casado
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="estado_civil" value="viudo" class="mr-2"> Viudo
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="estado_civil" value="divorciado" class="mr-2"> Divorciado
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="estado_civil" value="separado" class="mr-2"> Separado
                    </label>
                </div>
            </div>

        <!-- Número de CUIL -->
        <div class="mb-4">
            <x-input-label for="cuil" :value="__('N° de CUIL')" />
            <x-text-input id="cuil" class="block mt-1 w-full" type="text" name="cuil" required />
        </div>

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
                        <option value="educacion_inicial">Profesorado de Educación Inicial</option>
                        <option value="educacion_primaria">Profesorado de Educación Primaria</option>
                        <option value="educacion_matematica">Profesorado de Educación Secundaria en Matemática</option>
                        <option value="musica">Profesorado de Música</option>
                        <option value="analista_sistemas">Técnico Superior Analista de Sistemas</option>
                        <option value="contable">Técnico Superior Contable Administrativo</option>
                        <option value="enfermeria">Técnico Superior en Enfermería</option>
                    </select>
                </div>

        <!-- Selección del año de estudio (cambiará dinámicamente) -->
        <div>
            <label for="anio_estudio" class="block font-medium text-gray-700">Selecciona el año</label>
            <select name="anio_estudio" id="anio_estudio" required
                class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
            </select>
        </div>

        <script>
        document.addEventListener("DOMContentLoaded", function () {
            const carreraSelect = document.getElementById("carrera_interes");
            const anioSelect = document.getElementById("anio_estudio");

            // Definir carreras que solo tienen hasta 3° año
            const tecnicaturas = ["analista_sistemas", "contable", "enfermeria"];

            function actualizarOpcionesAnio() {
                anioSelect.innerHTML = ""; // Limpiar opciones

                let maxAnio = tecnicaturas.includes(carreraSelect.value) ? 3 : 4;

                for (let i = 1; i <= maxAnio; i++) {
                    let option = document.createElement("option");
                    option.value = i;
                    option.textContent = `${i}° Año`;
                    anioSelect.appendChild(option);
                }
            }

            // Evento para cambiar opciones del año según la carrera seleccionada
            carreraSelect.addEventListener("change", actualizarOpcionesAnio);

            // Inicializar opciones correctamente
            actualizarOpcionesAnio();
        });
        </script>

                <!-- Nivel Secundario -->
                <div>
                    <label for="nivel_secundario" class="block font-medium text-gray-700">NIVEL DE SECUNDARIO</label>
                    <select name="nivel_secundario" id="nivel_secundario" required
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 p-2">
                        <option value="">Seleccione una opción</option>
                        <option value="completo">Nivel Secundario completo</option>
                        <option value="proceso">Nivel Secundario en proceso</option>
                        <option value="incompleto">Nivel Secundario incompleto (Solicitar Protocolo de Admisión para mayores)</option>
                    </select>
                </div>
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
                            <input type="checkbox" name="Becas" value="yes">
                            Solicito hospedarme en las residencias del ISAM (Se admite el ingreso como estudiante residente hasta los 24 años).
                        </label>
                        <br>
                        <label>
                            <input type="checkbox" name="Becas" value="no">
                            No solicito hospedarme en las residencias del ISAM
                        </label>
                    </div>

                    <!-- Opciones adicionales si no se hospeda en el ISAM -->
                    <div x-show="showAdditionalFields" class="p-4 bg-gray-50 border border-gray-400">
                        <div class="mb-2">
                            <label>
                                <input type="checkbox" name="edad_adicional" value="mayor_20">
                                Soy mayor de 20 años
                            </label>
                        </div>
                        <div class="mb-2">
                            <label>
                                <input type="checkbox" name="edad_adicional" value="menor_20">
                                Soy menor de 20 años y viviré con:
                            </label>
                        </div>

                        <!-- Campos adicionales -->
                        <div class="grid grid-cols-1 gap-4 mt-4">
                            <div>
                                <x-input-label for="nombre_apellido" :value="__('Nombre y Apellido')" />
                                <x-text-input id="nombre_apellido" class="block mt-1 w-full" type="text" name="nombre_apellido" />
                            </div>
                            <div>
                                <x-input-label for="telefono" :value="__('Teléfono fijo')" />
                                <x-text-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" />
                            </div>
                            <div>
                                <x-input-label for="celular" :value="__('Celular')" />
                                <x-text-input id="celular" class="block mt-1 w-full" type="text" name="celular" />
                            </div>
                            <div>
                                <x-input-label for="direccion_tutor" :value="__('Dirección')" />
                                <x-text-input id="direccion_tutor" class="block mt-1 w-full" type="text" name="direccion_tutor" />
                            </div>
                            <div>
                                <x-input-label for="email_tutor" :value="__('Correo electrónico')" />
                                <x-text-input id="email_tutor" class="block mt-1 w-full" type="email" name="email_tutor" />
                            </div>
                            <div>
                                <x-input-label for="vinculo_familiar" :value="__('¿Cuál es el vínculo familiar?')" />
                                <x-text-input id="vinculo_familiar" class="block mt-1 w-full" type="text" name="vinculo_familiar" />
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

                <!-- Opciones de hospedaje -->
                <div class="mb-4">
                    <label>
                        <input type="checkbox" name="beca_parcial" value="yes">
                        Solicito inscribirme al programa de formacion profesional a contra turno del cursado de clases(plan de Beca parcial)
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="beca_total" value="yes">
                        Solicito inscribirme al programa de formacion profesional durante todo el año (Beca total)
                    </label>
                </div>
                <label>
                    <input type="checkbox" name="prestamo_honor" value="yes">
                    Préstamo de honor
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
                    <label>
                        <input type="checkbox" name="como_supo_isam" value="yes">
                             Alumno promotor
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="como_supo_isam" value="yes">
                             Iglesia
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="como_supo_isam" value="yes">
                            Familiares
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="como_supo_isam" value="yes">
                            Amigos
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="como_supo_isam" value="yes">
                            Folleto
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="como_supo_isam" value="yes">
                            Instituto Adventista
                    </label>
                    <br>
                    <label>
                        <input type="checkbox" name="como_supo_isam" value="yes">
                            Otro
                    </label>
                    <br>
                    <div class="p-4 bg-gray-100 border border-gray-400 mb-4">
                        Si quien le informo es un alumno del nivel superior del ISAM por favor denos el nombre y apellido
                    </div>
                    <x-input-label for="nombre_recomendado" :value="__('Nombre y Apellido')" />
                    <x-text-input id="nombre_recomendado" class="block mt-1 w-full" type="text" name="nombre_recomendado" />

                    <div class="p-4 bg-gray-100 border border-gray-400 mb-4">
                        ¿Cuales son las razones por las que eligió el ISAM para estudiar?
                    </div>
                    <label for="razon_estudio">Razón:</label>
                    <input type="text" name="razon_estudio" id="razon_estudio">

                </div>
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
            <div class="form-group">
                <label for="grupo_sanguineo">Grupo Sanguíneo</label>
                <input type="text" class="form-control" id="grupo_sanguineo" name="grupo_sanguineo" placeholder="Grupo Sanguíneo" required>
            </div>
            <div class="form-group">
                <label for="factor_rh">Factor RH</label>
                <input type="text" class="form-control" id="factor_rh" name="factor_rh" placeholder="Factor RH" required>
            </div>
            <div class="form-group">
                <label>¿Tiene algún problema de salud?</label>
                <div>
                    <label><input type="radio" name="problema_salud" value="1"> Sí</label>
                    <label><input type="radio" name="problema_salud" value="0"> No</label>
                </div>
                <input type="text" class="form-control" name="detalle_problema_salud" placeholder="¿Cuál?">
            </div>
            <div class="form-group">
                <label>¿Tiene algún problema que le impida realizar actividad física o manual?</label>
                <div>
                    <label><input type="radio" name="limitacion_fisica" value="1"> Sí</label>
                    <label><input type="radio" name="limitacion_fisica" value="0"> No</label>
                </div>
                <input type="text" class="form-control" name="detalle_limitacion_fisica" placeholder="¿Cuál?">
            </div>
            <div class="form-group">
                <label>¿Está bajo tratamiento médico?</label>
                <input type="text" class="form-control" name="tratamiento_medico" placeholder="¿Cuál?">
            </div>
            <div class="form-group">
                <label>Tiene obra social</label>
                <input type="text" class="form-control" name="obra_social" placeholder="¿Cuál?">
            </div>
            <div class="form-group">
                <label>N° de afiliado</label>
                <input type="text" class="form-control" name="nro_afiliado" placeholder="Numero">
            </div>
            <div class="form-group">
                <label>¿Estoy recibiendo o recibí tratamiento de rehabilitación por consumo de sustancias adictivas?</label>
                <div>
                    <label><input type="radio" name="rehabilitacion_sustancias" value="Nunca"> Nunca</label><br>
                    <label><input type="radio" name="rehabilitacion_sustancias" value="No en el último año"> No en el último año</label><br>
                    <label><input type="radio" name="rehabilitacion_sustancias" value="Alguna vez este año"> Alguna vez este año</label>
                </div>
            </div>
            <div class="form-group">
                <label>¿Estoy recibiendo o recibí tratamiento psicológico?</label>
                <div>
                    <label><input type="radio" name="tratamiento_psicologico" value="Nunca"> Nunca</label><br>
                    <label><input type="radio" name="tratamiento_psicologico" value="No en el último año"> No en el último año</label><br>
                    <label><input type="radio" name="tratamiento_psicologico" value="Alguna vez este año"> Alguna vez este año</label>
                </div>
            </div>
            <!-- Botón para continuar en la sección 7 -->

        </div>
    </x-slot>
    </div>

    <!-- Sección 7 -->
    <div x-show="currentSection === 7">
    <x-slot name="section7">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-lg mx-auto">
            <h1>INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
            <h2>PADRES DEL SOLICITANTE</h2>
            <!-- Padre -->
            <h2>PADRE</h2>
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="padre_apellido" :value="__('Apellido')" />
                    <x-text-input id="padre_apellido" class="block mt-1 w-full" type="text" name="padre_apellido" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="padre_nombre" :value="__('Nombres')" />
                    <x-text-input id="padre_nombre" class="block mt-1 w-full" type="text" name="padre_nombre" required />
                </div>
            </div>

            <!-- Domicilio -->
            <div class="mb-4">
                <x-input-label for="padre_direccion" :value="__('Dirección')" />
                <x-text-input id="padre_direccion" class="block mt-1 w-full" type="text" name="padre_direccion" required />
            </div>

            <!-- Código Postal, Localidad, Provincia, País -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="padre_cp" :value="__('CP')" />
                    <x-text-input id="padre_cp" class="block mt-1 w-full" type="text" name="padre_cp" required />
                </div>
                <div>
                    <x-input-label for="padre_localidad" :value="__('Localidad')" />
                    <x-text-input id="padre_localidad" class="block mt-1 w-full" type="text" name="padre_localidad" required />
                </div>
                <div>
                    <x-input-label for="padre_provincia" :value="__('Provincia')" />
                    <x-text-input id="padre_provincia" class="block mt-1 w-full" type="text" name="padre_provincia" required />
                </div>
                <div>
                    <x-input-label for="padre_pais" :value="__('País')" />
                    <x-text-input id="padre_pais" class="block mt-1 w-full" type="text" name="padre_pais" required />
                </div>
            </div>

            <!-- Teléfonos y Correo Electrónico -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="padre_telefono" :value="__('Teléfono celular')" />
                    <x-text-input id="padre_telefono" class="block mt-1 w-full" type="text" name="padre_telefono" required />
                </div>
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-4">
                <x-input-label for="padre_email" :value="__('Correo electrónico')" />
                <x-text-input id="padre_email" class="block mt-1 w-full" type="email" name="padre_email" required />
            </div>

            <!-- Documento tipo y Número -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="padre_tipo_documento" :value="__('Tipo de Documento')" />
                    <select id="padre_tipo_documento" name="padre_tipo_documento" class="block mt-1 w-full">
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="DNI">DNI</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="padre_documento" :value="__('Nº')" />
                    <x-text-input id="padre_documento" class="block mt-1 w-full" type="text" name="padre_documento" required />
                </div>
            </div>

            <!-- Edad y Ocupación -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-input-label for="padre_edad" :value="__('Edad')" />
                    <x-text-input id="padre_edad" class="block mt-1 w-full" type="number" name="padre_edad" required />
                </div>
                <div>
                    <x-input-label for="padre_ocupacion" :value="__('Ocupación')" />
                    <x-text-input id="padre_ocupacion" class="block mt-1 w-full" type="text" name="padre_ocupacion" required />
                </div>
            </div>

            <!-- Madre -->
            <h2>MADRE</h2>
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="madre_apellido" :value="__('Apellido')" />
                    <x-text-input id="madre_apellido" class="block mt-1 w-full" type="text" name="madre_apellido" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="madre_nombre" :value="__('Nombres')" />
                    <x-text-input id="madre_nombre" class="block mt-1 w-full" type="text" name="madre_nombre" required />
                </div>
            </div>

            <!-- Domicilio -->
            <div class="mb-4">
                <x-input-label for="madre_direccion" :value="__('Dirección')" />
                <x-text-input id="madre_direccion" class="block mt-1 w-full" type="text" name="madre_direccion" required />
            </div>

            <!-- Código Postal, Localidad, Provincia, País -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="madre_cp" :value="__('CP')" />
                    <x-text-input id="madre_cp" class="block mt-1 w-full" type="text" name="madre_cp" required />
                </div>
                <div>
                    <x-input-label for="madre_localidad" :value="__('Localidad')" />
                    <x-text-input id="madre_localidad" class="block mt-1 w-full" type="text" name="madre_localidad" required />
                </div>
                <div>
                    <x-input-label for="madre_provincia" :value="__('Provincia')" />
                    <x-text-input id="madre_provincia" class="block mt-1 w-full" type="text" name="madre_provincia" required />
                </div>
                <div>
                    <x-input-label for="madre_pais" :value="__('País')" />
                    <x-text-input id="madre_pais" class="block mt-1 w-full" type="text" name="madre_pais" required />
                </div>
            </div>

            <!-- Teléfonos y Correo Electrónico -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="madre_telefono" :value="__('Teléfono celular')" />
                    <x-text-input id="madre_telefono" class="block mt-1 w-full" type="text" name="madre_telefono" required />
                </div>
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-4">
                <x-input-label for="madre_email" :value="__('Correo electrónico')" />
                <x-text-input id="madre_email" class="block mt-1 w-full" type="email" name="madre_email" required />
            </div>

            <!-- Documento tipo y Número -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="madre_tipo_documento" :value="__('Tipo de Documento')" />
                    <select id="madre_tipo_documento" name="madre_tipo_documento" class="block mt-1 w-full">
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="DNI">DNI</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="madre_documento" :value="__('Nº')" />
                    <x-text-input id="madre_documento" class="block mt-1 w-full" type="text" name="madre_documento" required />
                </div>
            </div>

            <!-- Edad y Ocupación -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-input-label for="madre_edad" :value="__('Edad')" />
                    <x-text-input id="madre_edad" class="block mt-1 w-full" type="number" name="madre_edad" required />
                </div>
                <div>
                    <x-input-label for="madre_ocupacion" :value="__('Ocupación')" />
                    <x-text-input id="madre_ocupacion" class="block mt-1 w-full" type="text" name="madre_ocupacion" required />
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
                    <x-text-input id="resp_financiero_apellido" class="block mt-1 w-full" type="text" name="resp_financiero_apellido" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="resp_financiero_nombre" :value="__('Nombres')" />
                    <x-text-input id="resp_financiero_nombre" class="block mt-1 w-full" type="text" name="resp_financiero_nombre" required />
                </div>
            </div>

            <!-- Domicilio -->
            <div class="mb-4">
                <x-input-label for="resp_financiero_direccion" :value="__('Dirección')" />
                <x-text-input id="resp_financiero_direccion" class="block mt-1 w-full" type="text" name="resp_financiero_direccion" required />
            </div>

            <!-- Código Postal, Localidad, Provincia, País -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="resp_financiero_cp" :value="__('CP')" />
                    <x-text-input id="resp_financiero_cp" class="block mt-1 w-full" type="text" name="resp_financiero_cp" required />
                </div>
                <div>
                    <x-input-label for="resp_financiero_localidad" :value="__('Localidad')" />
                    <x-text-input id="resp_financiero_localidad" class="block mt-1 w-full" type="text" name="resp_financiero_localidad" required />
                </div>
                <div>
                    <x-input-label for="resp_financiero_provincia" :value="__('Provincia')" />
                    <x-text-input id="resp_financiero_provincia" class="block mt-1 w-full" type="text" name="resp_financiero_provincia" required />
                </div>
                <div>
                    <x-input-label for="resp_financiero_pais" :value="__('País')" />
                    <x-text-input id="resp_financiero_pais" class="block mt-1 w-full" type="text" name="resp_financiero_pais" required />
                </div>
            </div>

            <!-- Teléfonos y Correo Electrónico -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="resp_financiero_telefono" :value="__('Teléfono celular')" />
                    <x-text-input id="resp_financiero_telefono" class="block mt-1 w-full" type="text" name="resp_financiero_telefono" required />
                </div>
            </div>

            <!-- Correo Electrónico -->
            <div class="mb-4">
                <x-input-label for="resp_financiero_email" :value="__('Correo electrónico')" />
                <x-text-input id="resp_financiero_email" class="block mt-1 w-full" type="email" name="resp_financiero_email" required />
            </div>

            <!-- Documento tipo y Número -->
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="resp_financiero_tipo_documento" :value="__('Tipo de Documento')" />
                    <select id="resp_financiero_tipo_documento" name="resp_financiero_tipo_documento" class="block mt-1 w-full">
                        <option value="Pasaporte">Pasaporte</option>
                        <option value="DNI">DNI</option>
                    </select>
                </div>
                <div>
                    <x-input-label for="resp_financiero_documento" :value="__('Nº')" />
                    <x-text-input id="resp_financiero_documento" class="block mt-1 w-full" type="text" name="resp_financiero_documento" required />
                </div>
            </div>

            <!-- Edad y Ocupación -->
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <x-input-label for="resp_financiero_edad" :value="__('Edad')" />
                    <x-text-input id="resp_financiero_edad" class="block mt-1 w-full" type="number" name="resp_financiero_edad" required />
                </div>
                <div>
                    <x-input-label for="resp_financiero_ocupacion" :value="__('Ocupación')" />
                    <x-text-input id="resp_financiero_ocupacion" class="block mt-1 w-full" type="text" name="resp_financiero_ocupacion" required />
                </div>
            </div>
        </div>
    </x-slot>
    </div>

</x-form>

