
@extends('layouts.app')

@section('content')
<div class="p-6">

    {{-- ✅ Mensaje de éxito --}}
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif


    <!-- ✅ AlpineJS controla el formulario -->
    <form method="POST" action="{{ route('admissions.update', $admission->id) }}">
    @csrf
    @method('PUT')

    @if (session('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-100 border border-green-400">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-100 border border-red-400">
            <strong>Ocurrieron algunos errores:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


        <!-- ✅ Sección 1: Datos del solicitante -->
        <div x-show="currentSection === 1">
            <h2 class="text-xl font-bold text-blue-800 mb-4">DATOS DEL SOLICITANTE</h2>

            <!-- Apellido y Nombres -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="apellido" :value="__('Apellido')" />
                    <x-text-input id="apellido" class="block mt-1 w-full" type="text" name="apellido"
                        value="{{ old('apellido', $admission->apellido) }}" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="nombre" :value="__('Nombres')" />
                    <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre"
                        value="{{ old('nombre', $admission->nombre) }}" required />
                </div>
            </div>

            <!-- Fecha de Nacimiento -->
            <div class="mb-4">
                <x-input-label for="fecha_nacimiento" :value="__('Fecha de nacimiento')" />
                <x-text-input id="fecha_nacimiento" class="block mt-1 w-full" type="date" name="fecha_nacimiento"
                    value="{{ old('fecha_nacimiento', $admission->fecha_nacimiento) }}" required />
            </div>

            <!-- Documento -->
            <div class="mb-4">
                <x-input-label for="documento" :value="__('Documento')" />
                <x-text-input id="documento" class="block mt-1 w-full" type="number" name="documento"
                    value="{{ old('documento', $admission->documento) }}" placeholder="DNI" required />
            </div>

            <!-- Estado civil -->
            <div class="mb-4">
                <x-input-label :value="__('Estado civil')" />
                <select name="estado_civil" id="estado_civil" class="block mt-1 w-full border-gray-300 rounded-md">
                    <option value="">Seleccionar...</option>
                    <option value="soltero" {{ old('estado_civil', $admission->estado_civil) == 'soltero' ? 'selected' : '' }}>Soltero/a</option>
                    <option value="casado" {{ old('estado_civil', $admission->estado_civil) == 'casado' ? 'selected' : '' }}>Casado/a</option>
                    <option value="viudo" {{ old('estado_civil', $admission->estado_civil) == 'viudo' ? 'selected' : '' }}>Viudo/a</option>
                    <option value="divorciado" {{ old('estado_civil', $admission->estado_civil) == 'divorciado' ? 'selected' : '' }}>Divorciado/a</option>
                    <option value="separado" {{ old('estado_civil', $admission->estado_civil) == 'separado' ? 'selected' : '' }}>Separado/a</option>
                </select>
            </div>

            <!-- CUIL -->
            <div class="mb-4">
                <x-input-label for="cuil" :value="__('CUIL')" />
                <x-text-input id="cuil" type="text" name="cuil"
                    value="{{ old('cuil', $admission->cuil) }}"
                    inputmode="numeric" pattern="[0-9\-]*" placeholder="Ej: 20-12345678-3" required />
            </div>

            <!-- Género -->
            <div class="mb-4">
                <x-input-label :value="__('Género')" />
                <div class="flex items-center gap-4 mt-1">
                    <label class="flex items-center">
                        <input type="radio" name="genero" value="M" class="mr-2"
                            {{ old('genero', $admission->genero) == 'M' ? 'checked' : '' }}> Masculino
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="genero" value="F" class="mr-2"
                            {{ old('genero', $admission->genero) == 'F' ? 'checked' : '' }}> Femenino
                    </label>
                </div>
            </div>

            <!-- Nacionalidad -->
            <div class="mb-4">
                <x-input-label for="nacionalidad" :value="__('Nacionalidad')" />
                <x-text-input id="nacionalidad" class="block mt-1 w-full" type="text" name="nacionalidad"
                    value="{{ old('nacionalidad', $admission->nacionalidad) }}" required />
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <x-input-label for="direccion" :value="__('Dirección')" />
                <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion"
                    value="{{ old('direccion', $admission->direccion) }}" required />
            </div>

            <!-- Ciudad, Provincia, País -->
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div>
                    <x-input-label for="ciudad" :value="__('Ciudad')" />
                    <x-text-input id="ciudad" class="block mt-1 w-full" type="text" name="ciudad"
                        value="{{ old('ciudad', $admission->ciudad) }}" required />
                </div>
                <div>
                    <x-input-label for="provincia" :value="__('Provincia')" />
                    <x-text-input id="provincia" class="block mt-1 w-full" type="text" name="provincia"
                        value="{{ old('provincia', $admission->provincia) }}" required />
                </div>
                <div>
                    <x-input-label for="pais" :value="__('País')" />
                    <x-text-input id="pais" class="block mt-1 w-full" type="text" name="pais"
                        value="{{ old('pais', $admission->pais) }}" required />
                </div>
            </div>

            <!-- Código Postal -->
            <div class="mb-4">
                <x-input-label for="codigo_postal" :value="__('Código Postal')" />
                <x-text-input id="codigo_postal" class="block mt-1 w-full" type="text" name="codigo_postal"
                    value="{{ old('codigo_postal', $admission->codigo_postal) }}" required />
            </div>

            <!-- Teléfonos -->
            <div class="flex gap-4 mb-4">
                <div class="flex-1">
                    <x-input-label for="numero_telefono" :value="__('Teléfono')" />
                    <x-text-input id="numero_telefono" class="block mt-1 w-full" type="number" name="numero_telefono"
                        value="{{ old('numero_telefono', $admission->numero_telefono) }}" required />
                </div>
                <div class="flex-1">
                    <x-input-label for="telefono_alternativo" :value="__('Teléfono alternativo')" />
                    <x-text-input id="telefono_alternativo" class="block mt-1 w-full" type="number" name="telefono_alternativo"
                        value="{{ old('telefono_alternativo', $admission->telefono_alternativo) }}" />
                </div>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <x-input-label for="email" :value="__('Correo electrónico')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                    value="{{ old('email', $admission->email) }}" required />
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
                @php
                    $carrera = old('carrera_interes', $admission->carrera_interes);
                @endphp

                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Profesorado de Educación Inicial"
                        class="mr-2" {{ $carrera == 'Profesorado de Educación Inicial' ? 'checked' : '' }}>
                    Profesorado de Educación Inicial
                </label>

                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Profesorado de Educación Primaria"
                        class="mr-2" {{ $carrera == 'Profesorado de Educación Primaria' ? 'checked' : '' }}>
                    Profesorado de Educación Primaria
                </label>

                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Profesorado de Educación Secundaria en Matemática"
                        class="mr-2" {{ $carrera == 'Profesorado de Educación Secundaria en Matemática' ? 'checked' : '' }}>
                    Profesorado de Educación Secundaria en Matemática
                </label>

                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Profesorado de Música"
                        class="mr-2" {{ $carrera == 'Profesorado de Música' ? 'checked' : '' }}>
                    Profesorado de Música
                </label>

                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Técnico Superior Analista de Sistemas"
                        class="mr-2" {{ $carrera == 'Técnico Superior Analista de Sistemas' ? 'checked' : '' }}>
                    Técnico Superior Analista de Sistemas
                </label>

                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Técnico Superior Contable Administrativo"
                        class="mr-2" {{ $carrera == 'Técnico Superior Contable Administrativo' ? 'checked' : '' }}>
                    Técnico Superior Contable Administrativo
                </label>

                <label class="flex items-center">
                    <input type="radio" name="carrera_interes" value="Técnico Superior en Enfermería"
                        class="mr-2" {{ $carrera == 'Técnico Superior en Enfermería' ? 'checked' : '' }}>
                    Técnico Superior en Enfermería
                </label>
            </div>
        </div>

        <!-- Año de estudio -->
        <div class="mb-6">
            <x-input-label :value="__('Año de estudio al que desea ingresar')" />
            @php
                $anio = old('anio_estudio', $admission->anio_estudio);
            @endphp
            <select name="anio_estudio" id="anio_estudio"
                class="block mt-2 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Seleccione...</option>
                <option value="1° Año" {{ $anio == '1° Año' ? 'selected' : '' }}>1° Año</option>
                <option value="2° Año" {{ $anio == '2° Año' ? 'selected' : '' }}>2° Año</option>
                <option value="3° Año" {{ $anio == '3° Año' ? 'selected' : '' }}>3° Año</option>
                <option value="4° Año" {{ $anio == '4° Año' ? 'selected' : '' }}>4° Año</option>
            </select>
        </div>

        <!-- Nivel Secundario -->
        <div class="mb-6">
            <x-input-label :value="__('Nivel de educación secundaria')" />
            @php
                $nivel = old('nivel_secundario', $admission->nivel_secundario);
            @endphp
            <div class="flex flex-col gap-2 mt-2">
                <label class="flex items-center">
                    <input type="radio" name="nivel_secundario" value="Completo" class="mr-2"
                        {{ $nivel == 'Completo' ? 'checked' : '' }}>
                    Nivel Secundario Completo
                </label>

                <label class="flex items-center">
                    <input type="radio" name="nivel_secundario" value="En proceso" class="mr-2"
                        {{ $nivel == 'En proceso' ? 'checked' : '' }}>
                    Nivel Secundario en Proceso
                </label>

                <label class="flex items-center">
                    <input type="radio" name="nivel_secundario" value="Incompleto" class="mr-2"
                        {{ $nivel == 'Incompleto' ? 'checked' : '' }}>
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
        @php
            $residencia = old('solicita_residencia', $admission->solicita_residencia);
            $mayor20 = old('mayor_20', $admission->mayor_20);
        @endphp

        <div class="mb-6" x-data="{ residencia: '{{ $residencia }}' }">
            <x-input-label :value="__('¿Solicita hospedaje en el ISAM?')" />

            <div class="flex flex-col gap-2 mt-2">
                <label class="flex items-center">
                    <input type="radio" name="solicita_residencia" value="1"
                        class="mr-2"
                        x-model="residencia"
                        {{ $residencia == 1 ? 'checked' : '' }}>
                    Sí, deseo hospedarme en las residencias del ISAM (hasta 24 años).
                </label>

                <label class="flex items-center">
                    <input type="radio" name="solicita_residencia" value="0"
                        class="mr-2"
                        x-model="residencia"
                        {{ $residencia == 0 ? 'checked' : '' }}>
                    No, no solicito hospedarme en las residencias del ISAM.
                </label>
            </div>

            <!-- Información adicional (solo si residencia == 0) -->
            <template x-if="residencia == 0">
                <div class="p-4 bg-gray-50 border border-gray-300 rounded-lg mt-6">
                    <h3 class="text-md font-semibold mb-3">Información adicional</h3>

                    <div class="flex flex-col gap-3">
                        <label class="flex items-center">
                            <input type="radio" name="mayor_20" value="1" class="mr-2"
                                {{ $mayor20 == 1 ? 'checked' : '' }}>
                            Soy mayor de 20 años
                        </label>

                        <label class="flex items-center">
                            <input type="radio" name="mayor_20" value="0" class="mr-2"
                                {{ $mayor20 == 0 ? 'checked' : '' }}>
                            Soy menor de 20 años y viviré con:
                        </label>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <div>
                            <x-input-label for="nombre_conviviente" :value="__('Nombre y Apellido del conviviente')" />
                            <x-text-input id="nombre_conviviente" class="block mt-1 w-full" type="text"
                                name="nombre_conviviente"
                                value="{{ old('nombre_conviviente', $admission->nombre_conviviente) }}" />
                        </div>

                        <div>
                            <x-input-label for="telefono_conviviente" :value="__('Teléfono de contacto')" />
                            <x-text-input id="telefono_conviviente" class="block mt-1 w-full" type="text"
                                name="telefono_conviviente"
                                value="{{ old('telefono_conviviente', $admission->telefono_conviviente) }}" />
                        </div>

                        <div>
                            <x-input-label for="direccion_conviviente" :value="__('Dirección')" />
                            <x-text-input id="direccion_conviviente" class="block mt-1 w-full" type="text"
                                name="direccion_conviviente"
                                value="{{ old('direccion_conviviente', $admission->direccion_conviviente) }}" />
                        </div>

                        <div>
                            <x-input-label for="vinculo_familiar" :value="__('Vínculo familiar')" />
                            <x-text-input id="vinculo_familiar" class="block mt-1 w-full" type="text"
                                name="vinculo_familiar"
                                value="{{ old('vinculo_familiar', $admission->vinculo_familiar) }}" />
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
                <input type="checkbox" name="beca_parcial" value="1" class="mt-1"
                       {{ old('beca_parcial', $admission->beca_parcial ?? false) ? 'checked' : '' }}>
                <span>Solicito inscribirme al programa de formación profesional a contraturno del cursado de clases (plan de Beca parcial).</span>
            </label>

            <label class="flex items-start gap-2">
                <input type="checkbox" name="beca_total" value="1" class="mt-1"
                       {{ old('beca_total', $admission->beca_total ?? false) ? 'checked' : '' }}>
                <span>Solicito inscribirme al programa de formación profesional durante todo el año (Beca total).</span>
            </label>

            <label class="flex items-start gap-2">
                <input type="checkbox" name="prestamo_honor" value="1" class="mt-1"
                       {{ old('prestamo_honor', $admission->prestamo_honor ?? false) ? 'checked' : '' }}>
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

        @php
            // Decodificar el JSON si existe (para el edit)
            $fuentesSeleccionadas = is_string($admission->fuente_informacion ?? null)
                ? json_decode($admission->fuente_informacion, true)
                : (old('fuente_informacion', []) ?? []);
        @endphp

        <!-- Opciones de fuente de información -->
        <div class="space-y-3 mb-6">
            @foreach ([
                'alumno_promotor' => 'Alumno promotor',
                'iglesia' => 'Iglesia',
                'familiares' => 'Familiares',
                'amigos' => 'Amigos',
                'folleto' => 'Folleto',
                'instituto_adventista' => 'Instituto Adventista',
                'otro' => 'Otro',
            ] as $valor => $texto)
                <label class="flex items-center">
                    <input type="checkbox"
                           name="fuente_informacion[]"
                           value="{{ $valor }}"
                           class="mr-2"
                           {{ in_array($valor, $fuentesSeleccionadas ?? []) ? 'checked' : '' }}>
                    {{ $texto }}
                </label>
            @endforeach
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
            <x-text-input id="referente_nombre"
                          class="block mt-1 w-full"
                          type="text"
                          name="referente_nombre"
                          value="{{ old('referente_nombre', $admission->referente_nombre ?? '') }}" />
        </div>

        <!-- Motivo de elección -->
        <div class="p-4 bg-gray-50 border border-gray-300 rounded mb-4">
            <p>¿Cuáles son las razones por las que eligió el ISAM para estudiar?</p>
        </div>

        <div class="mb-6">
            <x-input-label for="razon_eleccion" :value="__('Motivo principal')" />
            <textarea id="razon_eleccion"
                      name="razon_eleccion"
                      rows="3"
                      class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">{{ old('razon_eleccion', $admission->razon_eleccion ?? '') }}</textarea>
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
                    @foreach(['A','B','AB','O'] as $grupo)
                        <option value="{{ $grupo }}" {{ old('blood_type', $admission->blood_type ?? '') == $grupo ? 'selected' : '' }}>
                            {{ $grupo }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <x-input-label for="rh_factor" :value="__('Factor RH')" />
                <select name="rh_factor" id="rh_factor"
                    class="block mt-2 w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="">Seleccione...</option>
                    <option value="+" {{ old('rh_factor', $admission->rh_factor ?? '') == '+' ? 'selected' : '' }}>+</option>
                    <option value="-" {{ old('rh_factor', $admission->rh_factor ?? '') == '-' ? 'selected' : '' }}>-</option>
                </select>
            </div>
        </div>

        <!-- Problema de salud -->
        <div class="mb-6">
            <x-input-label :value="__('¿Tiene algún problema de salud?')" />
            <div class="flex gap-4 mt-1">
                <label class="flex items-center">
                    <input type="radio" name="health_problem" value="1" class="mr-2"
                        {{ old('health_problem', $admission->health_problem ?? '') == 1 ? 'checked' : '' }}> Sí
                </label>
                <label class="flex items-center">
                    <input type="radio" name="health_problem" value="0" class="mr-2"
                        {{ old('health_problem', $admission->health_problem ?? '') == 0 ? 'checked' : '' }}> No
                </label>
            </div>
            <x-text-input name="health_problem_description"
                class="block mt-2 w-full"
                type="text"
                placeholder="¿Cuál?"
                value="{{ old('health_problem_description', $admission->health_problem_description ?? '') }}" />
        </div>

        <!-- Limitaciones físicas -->
        <div class="mb-6">
            <x-input-label :value="__('¿Tiene algún problema que le impida realizar actividad física o manual?')" />
            <div class="flex gap-4 mt-1">
                <label class="flex items-center">
                    <input type="radio" name="physical_limitation" value="1" class="mr-2"
                        {{ old('physical_limitation', $admission->physical_limitation ?? '') == 1 ? 'checked' : '' }}> Sí
                </label>
                <label class="flex items-center">
                    <input type="radio" name="physical_limitation" value="0" class="mr-2"
                        {{ old('physical_limitation', $admission->physical_limitation ?? '') == 0 ? 'checked' : '' }}> No
                </label>
            </div>
            <x-text-input name="physical_limitation_description"
                class="block mt-2 w-full"
                type="text"
                placeholder="¿Cuál?"
                value="{{ old('physical_limitation_description', $admission->physical_limitation_description ?? '') }}" />
        </div>

        <!-- Tratamiento médico -->
        <div class="mb-6">
            <x-input-label for="medical_treatment_description" :value="__('¿Está bajo tratamiento médico?')" />
            <div class="flex gap-4 mt-1">
                <label class="flex items-center">
                    <input type="radio" name="tratamiento" value="1" class="mr-2"
                        {{ old('tratamiento', $admission->tratamiento ?? '') == 1 ? 'checked' : '' }}> Sí
                </label>
                <label class="flex items-center">
                    <input type="radio" name="tratamiento" value="0" class="mr-2"
                        {{ old('tratamiento', $admission->tratamiento ?? '') == 0 ? 'checked' : '' }}> No
                </label>
            </div>
            <x-text-input id="medical_treatment_description"
                class="block mt-1 w-full"
                type="text"
                name="medical_treatment_description"
                placeholder="¿Cuál?"
                value="{{ old('medical_treatment_description', $admission->medical_treatment_description ?? '') }}" />
        </div>

        <!-- Obra social -->
        <div class="grid grid-cols-2 gap-4 mb-6">
            <div>
                <x-input-label for="social_security_description" :value="__('Obra social')" />
                <div class="flex gap-4 mt-1">
                    <label class="flex items-center">
                        <input type="radio" name="obra" value="1" class="mr-2"
                            {{ old('obra', $admission->obra ?? '') == 1 ? 'checked' : '' }}> Sí
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="obra" value="0" class="mr-2"
                            {{ old('obra', $admission->obra ?? '') == 0 ? 'checked' : '' }}> No
                    </label>
                </div>
                <x-text-input id="social_security_description"
                    class="block mt-1 w-full"
                    type="text"
                    name="social_security_description"
                    placeholder="¿Cuál?"
                    value="{{ old('social_security_description', $admission->social_security_description ?? '') }}" />
            </div>
            <div>
                <x-input-label for="affiliate_number" :value="__('N° de afiliado')" />
                <x-text-input id="affiliate_number"
                    class="block mt-1 w-full"
                    type="text"
                    name="affiliate_number"
                    placeholder="Número"
                    value="{{ old('affiliate_number', $admission->affiliate_number ?? '') }}" />
            </div>
        </div>

        <!-- Tratamiento por sustancias -->
        <div class="mb-6">
            <x-input-label :value="__('¿Recibió tratamiento de rehabilitación por consumo de sustancias adictivas?')" />
            <div class="flex flex-col gap-1 mt-1">
                @foreach(['Nunca', 'No en el último año', 'Alguna vez este año'] as $valor)
                    <label>
                        <input type="radio" name="substance_treatment" value="{{ $valor }}" class="mr-2"
                            {{ old('substance_treatment', $admission->substance_treatment ?? '') == $valor ? 'checked' : '' }}>
                        {{ $valor }}
                    </label>
                @endforeach
            </div>
        </div>

        <!-- Tratamiento psicológico -->
        <div class="mb-6">
            <x-input-label :value="__('¿Recibió tratamiento psicológico?')" />
            <div class="flex flex-col gap-1 mt-1">
                @foreach(['Nunca', 'No en el último año', 'Alguna vez este año'] as $valor)
                    <label>
                        <input type="radio" name="psychological_treatment" value="{{ $valor }}" class="mr-2"
                            {{ old('psychological_treatment', $admission->psychological_treatment ?? '') == $valor ? 'checked' : '' }}>
                        {{ $valor }}
                    </label>
                @endforeach
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
        <h1 class="text-2xl font-bold text-blue-800 mb-2">
            INSTITUTO SUPERIOR ADVENTISTA DE MISIONES
        </h1>
        <h2 class="text-lg font-semibold mb-6">PADRES DEL SOLICITANTE</h2>

        <!-- 👨 PADRE -->
        <h3 class="text-blue-700 font-semibold mb-2">PADRE</h3>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="father_last_name" :value="__('Apellido')" />
                <x-text-input id="father_last_name" class="block mt-1 w-full" type="text" name="father_last_name"
                    value="{{ old('father_last_name', $admission->father_last_name ?? '') }}" required />
            </div>
            <div>
                <x-input-label for="father_first_name" :value="__('Nombres')" />
                <x-text-input id="father_first_name" class="block mt-1 w-full" type="text" name="father_first_name"
                    value="{{ old('father_first_name', $admission->father_first_name ?? '') }}" required />
            </div>
        </div>

        <div class="mb-4">
            <x-input-label for="father_address" :value="__('Dirección')" />
            <x-text-input id="father_address" class="block mt-1 w-full" type="text" name="father_address"
                value="{{ old('father_address', $admission->father_address ?? '') }}" required />
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="father_phone" :value="__('Teléfono')" />
                <x-text-input id="father_phone" class="block mt-1 w-full" type="text" name="father_phone"
                    value="{{ old('father_phone', $admission->father_phone ?? '') }}" required />
            </div>
            <div>
                <x-input-label for="father_email" :value="__('Correo electrónico')" />
                <x-text-input id="father_email" class="block mt-1 w-full" type="email" name="father_email"
                    value="{{ old('father_email', $admission->father_email ?? '') }}" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="father_document_number" :value="__('Documento')" />
                <x-text-input id="father_document_number" class="block mt-1 w-full" type="text" name="father_document_number"
                    placeholder="DNI"
                    value="{{ old('father_document_number', $admission->father_document_number ?? '') }}" required />
            </div>
            <div>
                <x-input-label for="father_occupation" :value="__('Ocupación')" />
                <x-text-input id="father_occupation" class="block mt-1 w-full" type="text" name="father_occupation"
                    value="{{ old('father_occupation', $admission->father_occupation ?? '') }}" required />
            </div>
        </div>

        <!-- 👩 MADRE -->
        <h3 class="text-blue-700 font-semibold mb-2 mt-6">MADRE</h3>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="mother_last_name" :value="__('Apellido')" />
                <x-text-input id="mother_last_name" class="block mt-1 w-full" type="text" name="mother_last_name"
                    value="{{ old('mother_last_name', $admission->mother_last_name ?? '') }}" required />
            </div>
            <div>
                <x-input-label for="mother_first_name" :value="__('Nombres')" />
                <x-text-input id="mother_first_name" class="block mt-1 w-full" type="text" name="mother_first_name"
                    value="{{ old('mother_first_name', $admission->mother_first_name ?? '') }}" required />
            </div>
        </div>

        <div class="mb-4">
            <x-input-label for="mother_address" :value="__('Dirección')" />
            <x-text-input id="mother_address" class="block mt-1 w-full" type="text" name="mother_address"
                value="{{ old('mother_address', $admission->mother_address ?? '') }}" required />
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="mother_phone" :value="__('Teléfono')" />
                <x-text-input id="mother_phone" class="block mt-1 w-full" type="text" name="mother_phone"
                    value="{{ old('mother_phone', $admission->mother_phone ?? '') }}" required />
            </div>
            <div>
                <x-input-label for="mother_email" :value="__('Correo electrónico')" />
                <x-text-input id="mother_email" class="block mt-1 w-full" type="email" name="mother_email"
                    value="{{ old('mother_email', $admission->mother_email ?? '') }}" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="mother_document_number" :value="__('Documento')" />
                <x-text-input id="mother_document_number" class="block mt-1 w-full" type="text" name="mother_document_number"
                    placeholder="DNI"
                    value="{{ old('mother_document_number', $admission->mother_document_number ?? '') }}" required />
            </div>
            <div>
                <x-input-label for="mother_occupation" :value="__('Ocupación')" />
                <x-text-input id="mother_occupation" class="block mt-1 w-full" type="text" name="mother_occupation"
                    value="{{ old('mother_occupation', $admission->mother_occupation ?? '') }}" required />
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
        <h1 class="text-2xl font-bold text-blue-800 mb-2">
            INSTITUTO SUPERIOR ADVENTISTA DE MISIONES
        </h1>

        <h2 class="text-lg font-semibold mb-6">
            RESPONSABLE FINANCIERO
        </h2>

        <!-- 🧾 Datos del responsable -->
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="financial_last_name" :value="__('Apellido')" />
                <x-text-input id="financial_last_name" class="block mt-1 w-full"
                    type="text" name="financial_last_name" value="{{ old('financial_last_name', $admission->financial_last_name ?? '') }}" required />
            </div>

            <div>
                <x-input-label for="financial_first_name" :value="__('Nombres')" />
                <x-text-input id="financial_first_name" class="block mt-1 w-full"
                    type="text" name="financial_first_name" value="{{ old('financial_first_name', $admission->financial_first_name ?? '') }}" required />
            </div>
        </div>

        <div class="mb-4">
            <x-input-label for="financial_address" :value="__('Dirección')" />
            <x-text-input id="financial_address" class="block mt-1 w-full"
                type="text" name="financial_address" value="{{ old('financial_address', $admission->financial_address ?? '') }}" required />
        </div>

        <div class="grid grid-cols-4 gap-4 mb-4">
            <div>
                <x-input-label for="financial_postal_code" :value="__('CP')" />
                <x-text-input id="financial_postal_code" class="block mt-1 w-full"
                    type="text" name="financial_postal_code" value="{{ old('financial_postal_code', $admission->financial_postal_code ?? '') }}" required />
            </div>

            <div>
                <x-input-label for="financial_locality" :value="__('Localidad')" />
                <x-text-input id="financial_locality" class="block mt-1 w-full"
                    type="text" name="financial_locality" value="{{ old('financial_locality', $admission->financial_locality ?? '') }}" required />
            </div>

            <div>
                <x-input-label for="financial_province" :value="__('Provincia')" />
                <x-text-input id="financial_province" class="block mt-1 w-full"
                    type="text" name="financial_province" value="{{ old('financial_province', $admission->financial_province ?? '') }}" required />
            </div>

            <div>
                <x-input-label for="financial_country" :value="__('País')" />
                <x-text-input id="financial_country" class="block mt-1 w-full"
                    type="text" name="financial_country" value="{{ old('financial_country', $admission->financial_country ?? '') }}" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="financial_phone" :value="__('Teléfono celular')" />
                <x-text-input id="financial_phone" class="block mt-1 w-full"
                    type="tel" name="financial_phone" value="{{ old('financial_phone', $admission->financial_phone ?? '') }}" required />
            </div>

            <div>
                <x-input-label for="financial_email" :value="__('Correo electrónico')" />
                <x-text-input id="financial_email" class="block mt-1 w-full"
                    type="email" name="financial_email" value="{{ old('financial_email', $admission->financial_email ?? '') }}" required />
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <x-input-label for="financial_document_number" :value="__('Documento')" />
                <x-text-input id="financial_document_number" class="block mt-1 w-full"
                    type="number" name="financial_document_number" placeholder="DNI"
                    value="{{ old('financial_document_number', $admission->financial_document_number ?? '') }}" required />
            </div>
            <div>
                <x-input-label for="financial_age" :value="__('Edad')" />
                <x-text-input id="financial_age" class="block mt-1 w-full"
                    type="number" name="financial_age" value="{{ old('financial_age', $admission->financial_age ?? '') }}" required />
            </div>
        </div>

        <div class="mb-6">
            <x-input-label for="financial_occupation" :value="__('Ocupación')" />
            <x-text-input id="financial_occupation" class="block mt-1 w-full"
                type="text" name="financial_occupation" value="{{ old('financial_occupation', $admission->financial_occupation ?? '') }}" required />
        </div>

        <!-- 🔘 Navegación -->
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
</form>
