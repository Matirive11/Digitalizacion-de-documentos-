@extends('layouts.app')

@section('content')
<div class="p-6">
    <!-- ✅ AlpineJS controla el formulario -->
    <form method="POST" action="{{ route('admissions.store') }}" x-data="{ currentSection: 1, residencia: null }">
        @csrf

        <!-- ✅ Sección 1: Datos del solicitante -->
        <div x-show="currentSection === 1">
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

            <!-- Fecha de Nacimiento -->
            <div class="mb-4">
                <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento" required />
            </div>

            <!-- Documento -->
            <div class="mb-4">
                <x-input-label for="documento" :value="__('Documento')" />
                <x-text-input id="documento" class="block mt-1 w-full" type="number" name="documento" placeholder="DNI" required />
            </div>

            <!-- Estado civil -->
            <div class="mb-4">
                <x-input-label :value="__('Estado civil')" />
                <select name="estado_civil" id="estado_civil" class="block mt-1 w-full border-gray-300 rounded-md" >
                    <option value="">Seleccionar...</option>
                    <option value="soltero">Soltero/a</option>
                    <option value="casado">Casado/a</option>
                    <option value="viudo">Viudo/a</option>
                    <option value="divorciado">Divorciado/a</option>
                    <option value="separado">Separado/a</option>
                </select>
            </div>

            <!-- CUIL -->
            <div class="mb-4">
                <x-input-label for="cuil" :value="__('CUIL')" />
                <x-text-input id="cuil" type="text" name="cuil" inputmode="numeric" pattern="[0-9\-]*" placeholder="Ej: 20-12345678-3" require/>
            </div>

            <!-- Género -->
            <div class="mb-4">
                <x-input-label :value="__('Género')" />
                <div class="flex items-center gap-4 mt-1">
                    <label class="flex items-center">
                        <input type="radio" name="genero" value="M" class="mr-2"> Masculino
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="genero" value="F" class="mr-2"> Femenino
                    </label>
                </div>
            </div>

            <!-- Nacionalidad -->
            <div class="mb-4">
                <x-input-label for="nacionalidad" :value="__('Nacionalidad')" />
                <x-text-input id="nacionalidad" class="block mt-1 w-full" type="text" name="nacionalidad" required/>
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <x-input-label for="direccion" :value="__('Dirección')" required/>
                <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" />
            </div>

            <!-- Ciudad, Provincia, País -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <x-input-label for="ciudad" :value="__('Ciudad')" />
                    <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad" required/>
                </div>
                <div>
                    <x-input-label for="provincia" :value="__('Provincia')" />
                    <x-text-input id="provincia" class="block mt-1 w-full" type="text" name="provincia" required/>
                </div>
                <div>
                    <x-input-label for="pais" :value="__('País')" />
                    <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais" required/>
                </div>
            </div>

            <!-- Código Postal -->
            <div class="mb-4">
                <x-input-label for="codigo_postal" :value="__('Código Postal')" />
                <x-text-input id="codigo_postal" class="block mt-1 w-full" type="text" name="codigo_postal" required/>
            </div>

            <!-- Teléfonos -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="numero_telefono" :value="__('Teléfono')" />
                    <x-text-input id="numero_telefono" class="block mt-1 w-full" type="number" name="numero_telefono" required/>
                </div>
                <div class="flex-1">
                    <x-input-label for="telefono_alternativo" :value="__('Teléfono alternativo')" />
                    <x-text-input id="telefono_alternativo" class="block mt-1 w-full" type="number" name="telefono_alternativo" />
                </div>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required />
            </div>


            <!-- Botón para ir a la Sección 2 -->
            <div class="text-center mt-6">
                <x-primary-button type="button" @click="currentSection++">
                    {{ __('Guardar y Continuar') }}
                </x-primary-button>
            </div>
        </div>
<!-- ✅ Sección 2 - Carrera y Año -->
<div x-show="currentSection === 2" x-cloak>
    <div class="container mx-auto bg-white p-6 rounded-xl shadow-md">

        <h1 class="text-2xl font-bold text-blue-800 mb-2">
            INSTITUTO SUPERIOR ADVENTISTA DE MISIONES
        </h1>

        <h2 class="text-lg font-semibold mb-6">
            CARRERA Y AÑO DE ESTUDIO AL QUE DESEA INGRESAR EL SOLICITANTE
        </h2>

        <!-- Carrera de interés -->
        <div class="mb-6">
            <x-input-label :value="__('Carrera de interés')" />
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mt-2">
                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Profesorado de Educación Inicial" class="mr-2">
                    Profesorado de Educación Inicial
                </label>
                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Profesorado de Educación Primaria" class="mr-2">
                    Profesorado de Educación Primaria
                </label>
                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Profesorado de Educación Secundaria en Matemática" class="mr-2">
                    Profesorado de Educación Secundaria en Matemática
                </label>
                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Profesorado de Música" class="mr-2">
                    Profesorado de Música
                </label>
                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Técnico Superior Analista de Sistemas" class="mr-2">
                    Técnico Superior Analista de Sistemas
                </label>
                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Técnico Superior Contable Administrativo" class="mr-2">
                    Técnico Superior Contable Administrativo
                </label>
                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Técnico Superior en Enfermería" class="mr-2">
                    Técnico Superior en Enfermería
                </label>
            </div>
        </div>

        <!-- Año de estudio -->
        <div class="mb-6">
            <x-input-label :value="__('Año de estudio al que desea ingresar')" />
            <select name="anio_estudio" id="anio_estudio"
                class="block mt-2 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Seleccione...</option>
                <option value="1° Año">1° Año</option>
                <option value="2° Año">2° Año</option>
                <option value="3° Año">3° Año</option>
                <option value="4° Año">4° Año</option>
            </select>
        </div>

        <!-- Nivel Secundario -->
        <div class="mb-6">
            <x-input-label :value="__('Nivel de educación secundaria')" />
            <div class="flex flex-col gap-2 mt-2">
                <label class="flex items-center">
                    <input type="radio" name="nivel_secundario" value="Completo" class="mr-2">
                    Nivel Secundario Completo
                </label>
                <label class="flex items-center">
                    <input type="radio" name="nivel_secundario" value="En proceso" class="mr-2">
                    Nivel Secundario en Proceso
                </label>
                <label class="flex items-center">
                    <input type="radio" name="nivel_secundario" value="Incompleto" class="mr-2">
                    Nivel Secundario Incompleto (Solicitar Protocolo de Admisión)
                </label>
            </div>
        </div>

        <!-- Botones de navegación -->
        <div class="text-center mt-6 flex justify-center gap-4">
            <x-secondary-button type="button" @click="currentSection = 1">
                {{ __('Volver a Sección 1') }}
            </x-secondary-button>

            <x-primary-button type="button" @click="currentSection = 3">
                {{ __('Guardar y Continuar') }}
            </x-primary-button>
        </div>
    </div>
</div>
<!-- ✅ Sección 3 - Vida Estudiantil -->
<div x-show="currentSection === 3" x-cloak>
    <div class="container mx-auto bg-white p-6 rounded-xl shadow-md">

        <h1 class="text-2xl font-bold text-blue-800 mb-2">
            INSTITUTO SUPERIOR ADVENTISTA DE MISIONES
        </h1>

        <h2 class="text-lg font-semibold mb-6">
            VIDA ESTUDIANTIL
        </h2>

        <!-- Mensaje de advertencia -->
        <div class="p-4 bg-yellow-50 border border-yellow-400 mb-6 rounded-lg">
            <strong>IMPORTANTE:</strong> Los estudiantes solteros menores de 20 años que no residan
            en el hogar paterno o con familiares directos (abuelos o hermanos con familia constituida)
            deberán vivir en las residencias del ISAM (al momento de la matriculación deberán tener
            20 años cumplidos).
        </div>

        <!-- ¿Solicita hospedaje en el ISAM? -->
        <div class="mb-6" x-data="{ residencia: null }">
            <x-input-label :value="__('¿Solicita hospedaje en el ISAM?')" />

            <div class="flex flex-col gap-2 mt-2">
                <label class="flex items-center">
                    <input type="radio" name="solicita_residencia" value="1" x-model="residencia" class="mr-2">
                    Sí, deseo hospedarme en las residencias del ISAM (hasta 24 años).
                </label>

                <label class="flex items-center">
                    <input type="radio" name="solicita_residencia" value="0" x-model="residencia" class="mr-2">
                    No, no solicito hospedarme en las residencias del ISAM.
                </label>
            </div>

            <!-- Información adicional (solo si residencia == 0) -->
            <template x-if="residencia == 0">
                <div class="p-4 bg-gray-50 border border-gray-300 rounded-lg mt-6">
                    <h3 class="text-md font-semibold mb-3">Información adicional</h3>

                    <div class="flex flex-col gap-3">
                        <label class="flex items-center">
                            <input type="radio" name="mayor_20" value="1" class="mr-2">
                            Soy mayor de 20 años
                        </label>

                        <label class="flex items-center">
                            <input type="radio" name="mayor_20" value="0" class="mr-2">
                            Soy menor de 20 años y viviré con:
                        </label>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <div>
                            <x-input-label for="nombre_conviviente" :value="__('Nombre y Apellido del conviviente')" />
                            <x-text-input id="nombre_conviviente" class="block mt-1 w-full" type="text" name="nombre_conviviente" />
                        </div>

                        <div>
                            <x-input-label for="telefono_conviviente" :value="__('Teléfono de contacto')" />
                            <x-text-input id="telefono_conviviente" class="block mt-1 w-full" type="text" name="telefono_conviviente" />
                        </div>

                        <div>
                            <x-input-label for="direccion_conviviente" :value="__('Dirección')" />
                            <x-text-input id="direccion_conviviente" class="block mt-1 w-full" type="text" name="direccion_conviviente" />
                        </div>

                        <div>
                            <x-input-label for="vinculo_familiar" :value="__('Vínculo familiar')" />
                            <x-text-input id="vinculo_familiar" class="block mt-1 w-full" type="text" name="vinculo_familiar" />
                        </div>
                    </div>
                </div>
            </template>
        </div>

        <!-- Navegación -->
        <div class="text-center mt-8 flex justify-center gap-4">
            <x-secondary-button type="button" @click="currentSection = 2">
                {{ __('Volver a Sección 2') }}
            </x-secondary-button>

            <x-primary-button type="button" @click="currentSection = 4">
                {{ __('Guardar y Continuar') }}
            </x-primary-button>
        </div>

    </div>
</div>
<!-- ✅ Sección 4 - Programa de Formación Profesional -->
<div x-show="currentSection === 4" x-cloak>
    <div class="container mx-auto bg-white p-6 rounded-xl shadow-md">

        <h1 class="text-2xl font-bold text-blue-800 mb-2">
            INSTITUTO SUPERIOR ADVENTISTA DE MISIONES
        </h1>

        <h2 class="text-lg font-semibold mb-6">
            PROGRAMA DE FORMACIÓN PROFESIONAL
        </h2>

        <!-- Mensaje de advertencia -->
        <div class="p-4 bg-yellow-50 border border-yellow-400 mb-6 rounded-lg">
            <strong>PLANES DE BECAS:</strong> Para acceder a este programa debe cumplir con los requisitos,
            completar y enviar todos los formularios correspondientes junto con la planilla de inscripción.
            Luego deberá esperar la respuesta de aceptación.
        </div>

        <!-- Opciones del Programa -->
        <div class="space-y-4 mb-8">
            <label class="flex items-start gap-2">
                <input type="checkbox" name="beca_parcial" value="1" class="mt-1">
                <span>Solicito inscribirme al programa de formación profesional a contraturno del cursado de clases (plan de Beca parcial).</span>
            </label>

            <label class="flex items-start gap-2">
                <input type="checkbox" name="beca_total" value="1" class="mt-1">
                <span>Solicito inscribirme al programa de formación profesional durante todo el año (Beca total).</span>
            </label>

            <label class="flex items-start gap-2">
                <input type="checkbox" name="prestamo_honor" value="1" class="mt-1">
                <span>No solicito inscribirme a una beca</span>
            </label>
        </div>

        <!-- Navegación -->
        <div class="text-center mt-8 flex justify-center gap-4">
            <x-secondary-button type="button" @click="currentSection = 3">
                {{ __('Volver a Sección 3') }}
            </x-secondary-button>

            <x-primary-button type="button" @click="currentSection = 5">
                {{ __('Guardar y Continuar') }}
            </x-primary-button>
        </div>

    </div>
</div>
<!-- ✅ Sección 5 - ¿Cómo supo acerca del ISAM? -->
<div x-show="currentSection === 5" x-cloak>
    <div class="container mx-auto bg-white p-6 rounded-xl shadow-md">

        <h1 class="text-2xl font-bold text-blue-800 mb-2">
            INSTITUTO SUPERIOR ADVENTISTA DE MISIONES
        </h1>

        <h2 class="text-lg font-semibold mb-6">
            ¿CÓMO SUPO ACERCA DEL ISAM?
        </h2>

        <!-- Opciones de fuente de información -->
        <div class="space-y-3 mb-6">
            <label class="flex items-center">
                <input type="checkbox" name="fuente_informacion[]" value="alumno_promotor" class="mr-2">
                Alumno promotor
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="fuente_informacion[]" value="iglesia" class="mr-2">
                Iglesia
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="fuente_informacion[]" value="familiares" class="mr-2">
                Familiares
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="fuente_informacion[]" value="amigos" class="mr-2">
                Amigos
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="fuente_informacion[]" value="folleto" class="mr-2">
                Folleto
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="fuente_informacion[]" value="instituto_adventista" class="mr-2">
                Instituto Adventista
            </label>
            <label class="flex items-center">
                <input type="checkbox" name="fuente_informacion[]" value="otro" class="mr-2">
                Otro
            </label>
        </div>

        <!-- Si quien informó es un alumno -->
        <div class="p-4 bg-gray-50 border border-gray-300 rounded mb-6">
            <p>
                Si quien le informó es un alumno del nivel superior del ISAM,
                por favor indique su nombre y apellido.
            </p>
        </div>

        <div class="mb-4">
            <x-input-label for="referente_nombre" :value="__('Nombre y Apellido del alumno promotor (opcional)')" />
            <x-text-input id="referente_nombre" class="block mt-1 w-full" type="text" name="referente_nombre" />
        </div>

        <!-- Motivo de elección -->
        <div class="p-4 bg-gray-50 border border-gray-300 rounded mb-4">
            <p>¿Cuáles son las razones por las que eligió el ISAM para estudiar?</p>
        </div>

        <div class="mb-6">
            <x-input-label for="razon_eleccion" :value="__('Motivo principal')" />
            <textarea id="razon_eleccion" name="razon_eleccion" rows="3"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"></textarea>
        </div>

        <!-- Navegación -->
        <div class="text-center mt-8 flex justify-center gap-4">
            <x-secondary-button type="button" @click="currentSection = 4">
                {{ __('Volver a Sección 4') }}
            </x-secondary-button>

            <x-primary-button type="button" @click="currentSection = 6">
                {{ __('Guardar y Continuar') }}
            </x-primary-button>
        </div>

    </div>
</div>
<!-- ✅ Sección 6 - Salud del Solicitante -->
<div x-show="currentSection === 6" x-cloak>
    <div class="container mx-auto bg-white p-6 rounded-xl shadow-md">
        
        <h1 class="text-2xl font-bold text-blue-800 mb-2">
            INSTITUTO SUPERIOR ADVENTISTA DE MISIONES
        </h1>
        <h2 class="text-lg font-semibold mb-6">SALUD DEL SOLICITANTE</h2>

        <!-- Grupo sanguíneo y Factor RH -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <x-input-label for="blood_type" :value="__('Grupo sanguíneo')" />
            <select name="blood_type" id="blood_type"
                class="block mt-2 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Seleccione...</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
            </select>
            </div>
            <div>
                <x-input-label for="rh_factor" :value="__('Factor RH')" />
                <select name="rh_factor" id="rh_factor"
                class="block mt-2 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Seleccione...</option>
                <option value="1° Año">+</option>
                <option value="2° Año">-</option>

            </select>
            </div>
        </div>

        <!-- Problema de salud -->
        <div class="mb-6">
            <x-input-label :value="__('¿Tiene algún problema de salud?')" />
            <div class="flex gap-4 mt-1">
                <label class="flex items-center">
                    <input type="radio" name="health_problem" value="1" class="mr-2"> Sí
                </label>
                <label class="flex items-center">
                    <input type="radio" name="health_problem" value="0" class="mr-2"> No
                </label>
            </div>
            <x-text-input name="health_problem_description" class="block mt-2 w-full" type="text" placeholder="¿Cuál?" />
        </div>

        <!-- Limitaciones físicas -->
        <div class="mb-6">
            <x-input-label :value="__('¿Tiene algún problema que le impida realizar actividad física o manual?')" />
            <div class="flex gap-4 mt-1">
                <label class="flex items-center">
                    <input type="radio" name="physical_limitation" value="1" class="mr-2"> Sí
                </label>
                <label class="flex items-center">
                    <input type="radio" name="physical_limitation" value="0" class="mr-2"> No
                </label>
            </div>
            <x-text-input name="physical_limitation_description" class="block mt-2 w-full" type="text" placeholder="¿Cuál?" />
        </div>

        <!-- Tratamiento médico -->
        <div class="mb-6">
            <x-input-label for="medical_treatment_description" :value="__('¿Está bajo tratamiento médico?')" />
            <div class="flex gap-4 mt-1">
                <label class="flex items-center">
                    <input type="radio" name="tratamiento" value="1" class="mr-2"> Sí
                </label>
                <label class="flex items-center">
                    <input type="radio" name="tratamiento" value="0" class="mr-2"> No
                </label>
            </div>
            <x-text-input id="medical_treatment_description" class="block mt-1 w-full" type="text"
                name="medical_treatment_description" placeholder="¿Cuál?" />
        </div>

        <!-- Obra social -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <x-input-label for="social_security_description" :value="__('Obra social')" />
                <div class="flex gap-4 mt-1">
                <label class="flex items-center">
                    <input type="radio" name="obra" value="1" class="mr-2"> Sí
                </label>
                <label class="flex items-center">
                    <input type="radio" name="obra" value="0" class="mr-2"> No
                </label>
            </div>
                <x-text-input id="social_security_description" class="block mt-1 w-full" type="text"
                    name="social_security_description" placeholder="¿Cuál?" />
            </div>
            <div>
                <x-input-label for="affiliate_number" :value="__('N° de afiliado')" />
                <x-text-input id="affiliate_number" class="block mt-1 w-full" type="text"
                    name="affiliate_number" placeholder="Número" />
            </div>
        </div>

        <!-- Tratamiento por sustancias -->
        <div class="mb-6">
            <x-input-label :value="__('¿Recibió tratamiento de rehabilitación por consumo de sustancias adictivas?')" />
            <div class="flex flex-col gap-1 mt-1">
                <label><input type="radio" name="substance_treatment" value="Nunca" class="mr-2"> Nunca</label>
                <label><input type="radio" name="substance_treatment" value="No en el último año" class="mr-2"> No en el último año</label>
                <label><input type="radio" name="substance_treatment" value="Alguna vez este año" class="mr-2"> Alguna vez este año</label>
            </div>
        </div>

        <!-- Tratamiento psicológico -->
        <div class="mb-6">
            <x-input-label :value="__('¿Recibió tratamiento psicológico?')" />
            <div class="flex flex-col gap-1 mt-1">
                <label><input type="radio" name="psychological_treatment" value="Nunca" class="mr-2"> Nunca</label>
                <label><input type="radio" name="psychological_treatment" value="No en el último año" class="mr-2"> No en el último año</label>
                <label><input type="radio" name="psychological_treatment" value="Alguna vez este año" class="mr-2"> Alguna vez este año</label>
            </div>
        </div>

        <!-- Navegación -->
        <div class="text-center mt-8 flex justify-center gap-4">
            <x-secondary-button type="button" @click="currentSection = 5">
                {{ __('Volver a Sección 5') }}
            </x-secondary-button>

            <x-primary-button type="button" @click="currentSection = 7">
                {{ __('Guardar y Continuar') }}
            </x-primary-button>
        </div>

    </div>
</div>
<!-- ✅ Sección 7 - Padres del Solicitante -->
<div x-show="currentSection === 7" x-cloak>
    <div class="container mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-blue-800 mb-2">INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
        <h2 class="text-lg font-semibold mb-6">PADRES DEL SOLICITANTE</h2>

        <!-- 👨 PADRE -->
        <h3 class="text-blue-700 font-semibold mb-2">PADRE</h3>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="father_last_name" :value="__('Apellido')" />
                <x-text-input id="father_last_name" class="block mt-1 w-full" type="text" name="father_last_name" required/>
            </div>
            <div>
                <x-input-label for="father_first_name" :value="__('Nombres')" />
                <x-text-input id="father_first_name" class="block mt-1 w-full" type="text" name="father_first_name" required/>
            </div>
        </div>

        <div class="mb-4">
            <x-input-label for="father_address" :value="__('Dirección')" />
            <x-text-input id="father_address" class="block mt-1 w-full" type="text" name="father_address" required/>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="father_phone" :value="__('Teléfono')" />
                <x-text-input id="father_phone" class="block mt-1 w-full" type="number" name="father_phone" required/>
            </div>
            <div>
                <x-input-label for="father_email" :value="__('Correo electrónico')" />
                <x-text-input id="father_email" class="block mt-1 w-full" type="email" name="father_email" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="father_document_number" :value="__('Documento')" />
                <x-text-input id="father_document_number" class="block mt-1 w-full" type="number" name="father_document_number" placeholder="DNI" required/>
            </div>
            <div>
                <x-input-label for="father_occupation" :value="__('Ocupación')" />
                <x-text-input id="father_occupation" class="block mt-1 w-full" type="text" name="father_occupation" required/>
            </div>
        </div>

        <!-- 👩 MADRE -->
        <h3 class="text-blue-700 font-semibold mb-2 mt-6">MADRE</h3>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="mother_last_name" :value="__('Apellido')" />
                <x-text-input id="mother_last_name" class="block mt-1 w-full" type="text" name="mother_last_name" required/>
            </div>
            <div>
                <x-input-label for="mother_first_name" :value="__('Nombres')" />
                <x-text-input id="mother_first_name" class="block mt-1 w-full" type="text" name="mother_first_name" required/>
            </div>
        </div>

        <div class="mb-4">
            <x-input-label for="mother_address" :value="__('Dirección')" />
            <x-text-input id="mother_address" class="block mt-1 w-full" type="text" name="mother_address" required/>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="mother_phone" :value="__('Teléfono')" />
                <x-text-input id="mother_phone" class="block mt-1 w-full" type="number" name="mother_phone" required/>
            </div>
            <div>
                <x-input-label for="mother_email" :value="__('Correo electrónico')" />
                <x-text-input id="mother_email" class="block mt-1 w-full" type="email" name="mother_email" required/>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="mother_document_number" :value="__('Documento')" />
                <x-text-input id="mother_document_number" class="block mt-1 w-full" type="number" name="mother_document_number" placeholder="DNI" required/>
            </div>
            <div>
                <x-input-label for="mother_occupation" :value="__('Ocupación')" />
                <x-text-input id="mother_occupation" class="block mt-1 w-full" type="text" name="mother_occupation" required/>
            </div>
        </div>

        <!-- 🔘 Navegación -->
        <div class="text-center mt-8 flex justify-center gap-4">
            <x-secondary-button type="button" @click="currentSection = 6">
                {{ __('Volver a Sección 6') }}
            </x-secondary-button>

            <x-primary-button type="button" @click="currentSection = 8">
                {{ __('Guardar y Continuar') }}
            </x-primary-button>
        </div>
    </div>
</div>
<!-- ✅ Sección 8 - Responsable Financiero -->
<div x-show="currentSection === 8" x-cloak>
    <div class="container mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold text-blue-800 mb-2">INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
        <h2 class="text-lg font-semibold mb-6">RESPONSABLE FINANCIERO</h2>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="financial_last_name" :value="__('Apellido')" />
                <x-text-input id="financial_last_name" class="block mt-1 w-full" type="text" name="financial_last_name" required />
            </div>
            <div>
                <x-input-label for="financial_first_name" :value="__('Nombres')" />
                <x-text-input id="financial_first_name" class="block mt-1 w-full" type="text" name="financial_first_name" required />
            </div>
        </div>

        <div class="mb-4">
            <x-input-label for="financial_address" :value="__('Dirección')" />
            <x-text-input id="financial_address" class="block mt-1 w-full" type="text" name="financial_address" required />
        </div>

        <div class="grid grid-cols-4 gap-4 mb-4">
            <div>
                <x-input-label for="financial_postal_code" :value="__('CP')" />
                <x-text-input id="financial_postal_code" class="block mt-1 w-full" type="text" name="financial_postal_code" required />
            </div>
            <div>
                <x-input-label for="financial_locality" :value="__('Localidad')" />
                <x-text-input id="financial_locality" class="block mt-1 w-full" type="text" name="financial_locality" required />
            </div>
            <div>
                <x-input-label for="financial_province" :value="__('Provincia')" />
                <x-text-input id="financial_province" class="block mt-1 w-full" type="text" name="financial_province" required />
            </div>
            <div>
                <x-input-label for="financial_country" :value="__('País')" />
                <x-text-input id="financial_country" class="block mt-1 w-full" type="text" name="financial_country" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="financial_phone" :value="__('Teléfono celular')" />
                <x-text-input id="financial_phone" class="block mt-1 w-full" type="number" name="financial_phone" required />
            </div>
            <div>
                <x-input-label for="financial_email" :value="__('Correo electrónico')" />
                <x-text-input id="financial_email" class="block mt-1 w-full" type="email" name="financial_email" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">

            <div>
                <x-input-label for="financial_document_number" :value="__('Documento')" />
                <x-text-input id="financial_document_number" class="block mt-1 w-full" type="number" name="financial_document_number" placeholder="DNI" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="financial_age" :value="__('Edad')" />
                <x-text-input id="financial_age" class="block mt-1 w-full" type="number" name="financial_age" required />
            </div>
            <div>
                <x-input-label for="financial_occupation" :value="__('Ocupación')" />
                <x-text-input id="financial_occupation" class="block mt-1 w-full" type="text" name="financial_occupation" required />
            </div>
        </div>

        <!-- 🔘 Botones finales -->
        <div class="text-center mt-8 flex justify-center gap-4">
            <x-secondary-button type="button" @click="currentSection = 7">
                {{ __('Volver a Sección 7') }}
            </x-secondary-button>

            <x-primary-button type="submit">
                {{ __('Enviar Formulario') }}
            </x-primary-button>
        </div>
    </div>
</div>
