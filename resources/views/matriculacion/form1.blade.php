<x-form>
    <div x-data="{ currentSection: 1 }">

        <!-- Sección 1 -->
        <div x-show="currentSection === 1">
            <x-slot name="section1">
                <h2 class="text-xl font-bold text-blue-800 mb-4">DATOS DEL SOLICITANTE</h2>

                <!-- Apellido y Nombres -->
                <div class="flex gap-4 mb-4">
                    <div class="flex-1">
                        <x-input-label for="last_name" :value="__('Apellido')" />
                        <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" required />
                    </div>
                    <div class="flex-1">
                        <x-input-label for="first_name" :value="__('Nombres')" />
                        <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" required />
                    </div>
                </div>
                <!-- Otros campos de la sección 1 (continúa tu formulario aquí) -->
                <!-- Fecha de Nacimiento y Edad -->
        <div class="flex gap-4 mb-4">
            <div class="flex-1">
                <x-input-label for="birth_date" :value="__('Fecha de nacimiento')" />
                <x-text-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date" required />
            </div>
            <div class="flex-1">
                <x-input-label for="age" :value="__('Edad')" />
                <x-text-input id="age" class="block mt-1 w-full" type="number" name="age" required />
            </div>
        </div>

        <!-- Lugar de nacimiento, Provincia y País -->
        <div class="grid grid-cols-3 gap-4 mb-4">
            <div>
                <x-input-label for="birth_place" :value="__('Lugar de nacimiento')" />
                <x-text-input id="birth_place" class="block mt-1 w-full" type="text" name="birth_place" required />
            </div>
            <div>
                <x-input-label for="province" :value="__('Provincia')" />
                <x-text-input id="province" class="block mt-1 w-full" type="text" name="province" required />
            </div>
            <div>
                <x-input-label for="country" :value="__('País')" />
                <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" required />
            </div>
        </div>

        <!-- Documento tipo y Número -->
        <div class="flex gap-4 mb-4">
            <div>
                <x-input-label for="document_type" :value="__('Documento tipo')" />
                <select id="document_type" name="document_type" class="block mt-1 w-full">
                    <option value="passport">Pasaporte</option>
                    <option value="dni">DNI</option>
                </select>
            </div>
            <div>
                <x-input-label for="document_number" :value="__('Nº')" />
                <x-text-input id="document_number" class="block mt-1 w-full" type="text" name="document_number" required />
            </div>
        </div>

        <!-- Sexo -->
        <div class="mb-4">
            <x-input-label :value="__('Sexo')" />
            <div class="flex items-center gap-4 mt-1">
                <label class="flex items-center">
                    <input type="radio" name="gender" value="M" class="mr-2"> M
                </label>
                <label class="flex items-center">
                    <input type="radio" name="gender" value="F" class="mr-2"> F
                </label>
            </div>
        </div>

        <!-- Domicilio -->
        <div class="mb-4">
            <x-input-label for="address" :value="__('Domicilio Calle')" />
            <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" required />
        </div>

        <!-- Teléfonos y Correo Electrónico -->
        <div class="flex gap-4 mb-4">
            <div class="flex-1">
                <x-input-label for="phone" :value="__('Teléfono fijo')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" required />
            </div>
            <div class="flex-1">
                <x-input-label for="cellphone" :value="__('Teléfono celular')" />
                <x-text-input id="cellphone" class="block mt-1 w-full" type="text" name="cellphone" required />
            </div>
        </div>
               <!-- Código Postal, Localidad, Provincia, País -->
               <div class="grid grid-cols-4 gap-4 mb-4">
                <div>
                    <x-input-label for="postal_code" :value="__('CP')" />
                    <x-text-input id="postal_code" class="block mt-1 w-full" type="text" name="postal_code" required />
                </div>
                <div>
                    <x-input-label for="locality" :value="__('Localidad')" />
                    <x-text-input id="locality" class="block mt-1 w-full" type="text" name="locality" required />
                </div>
                <div>
                    <x-input-label for="province" :value="__('Provincia')" />
                    <x-text-input id="province" class="block mt-1 w-full" type="text" name="province" required />
                </div>
                <div>
                    <x-input-label for="country" :value="__('País')" />
                    <x-text-input id="country" class="block mt-1 w-full" type="text" name="country" required />
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
                        <input type="radio" name="adventist" value="yes" class="mr-2"> Sí
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="adventist" value="no" class="mr-2"> No
                    </label>
                </div>
            </div>
            <div>
                <x-input-label :value="__('¿Está bautizado?')" />
                <div class="flex items-center gap-4 mt-1">
                    <label class="flex items-center">
                        <input type="radio" name="baptized" value="yes" class="mr-2"> Sí
                    </label>
                    <label class="flex items-center">
                        <input type="radio" name="baptized" value="no" class="mr-2"> No
                    </label>
                </div>
            </div>
        </div>
    <!-- Iglesia a la que asiste -->
    <div class="mb-4">
        <x-input-label for="church" :value="__('¿A qué iglesia asiste?')" />
        <x-text-input id="church" class="block mt-1 w-full" type="text" name="church" required />
    </div>

    <!-- Estado Civil -->
    <div class="mb-4">
        <x-input-label :value="__('Estado civil')" />
        <div class="flex items-center gap-4 mt-1">
            <label class="flex items-center">
                <input type="radio" name="marital_status" value="single" class="mr-2"> Soltero
            </label>
            <label class="flex items-center">
                <input type="radio" name="marital_status" value="married" class="mr-2"> Casado
            </label>
            <label class="flex items-center">
                <input type="radio" name="marital_status" value="widowed" class="mr-2"> Viudo
            </label>
            <label class="flex items-center">
                <input type="radio" name="marital_status" value="divorced" class="mr-2"> Divorciado
            </label>
            <label class="flex items-center">
                <input type="radio" name="marital_status" value="separated" class="mr-2"> Separado
            </label>
        </div>
    </div>

    <!-- Número de CUIL -->
    <div class="mb-4">
        <x-input-label for="cuil" :value="__('N° de CUIL')" />
        <x-text-input id="cuil" class="block mt-1 w-full" type="text" name="cuil" required />
    </div>
                <!-- Botón para cambiar a la Sección 2 -->
                <div class="text-center mt-6">
                    <x-primary-button @click="currentSection = 2">
                        {{ __('Confirmar y Continuar') }}
                    </x-primary-button>
                </div>
            </x-slot>
        </div>

    <!-- Sección 2 -->
        <div x-show="currentSection === 2">
            <x-slot name="section2" class="section2-styles">
                <div class="container">
                    <h1>INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
                    <h2>CARRERA Y AÑO DE ESTUDIO AL QUE DESEA INGRESAR EL SOLICITANTE</h2>

                    <form>
                        <!-- Opciones de carrera -->
                        <div class="radio-group">
                            <label>CARRERA</label>
                            <label><input type="radio" name="carrera" value="educacion_inicial"> Profesorado de Educación Inicial</label>
                            <label><input type="radio" name="carrera" value="educacion_primaria"> Profesorado de Educación Primaria</label>
                            <label><input type="radio" name="carrera" value="educacion_matematica"> Profesorado de Educación Secundaria en Matemática</label>
                            <label><input type="radio" name="carrera" value="musica"> Profesorado de Música</label>
                            <label><input type="radio" name="carrera" value="analista_sistemas"> Técnico Superior Analista de Sistemas</label>
                            <label><input type="radio" name="carrera" value="contable"> Técnico Superior Contable Administrativo</label>
                            <label><input type="radio" name="carrera" value="enfermeria"> Técnico Superior en Enfermería</label>
                        </div>

                        <!-- Año de estudio -->
                        <div class="checkbox-group">
                            <label>AÑO</label>
                            <label><input type="checkbox" name="año" value="1"> 1° AÑO</label>
                            <label><input type="checkbox" name="año" value="2"> 2° AÑO</label>
                            <label><input type="checkbox" name="año" value="3"> 3° AÑO</label>
                            <label><input type="checkbox" name="año" value="4"> 4° AÑO</label>
                        </div>

                        <!-- Nivel de educación secundaria -->
                        <div class="checkbox-group">
                            <label>NIVEL DE SECUNDARIO</label>
                            <label><input type="checkbox" name="secundario_completo" value="completo"> Nivel Secundario completo</label>
                            <label><input type="checkbox" name="secundario_proceso" value="proceso"> Nivel Secundario en proceso</label>
                            <label><input type="checkbox" name="secundario_incompleto" value="incompleto"> Nivel Secundario incompleto (Solicitar Protocolo de Admisión para mayores)</label>
                        </div>
                    </form>
                    <!-- Botón para cambiar a la Sección 3 -->
                <div class="text-center mt-6">
                    <x-primary-button @click="currentSection = 3">
                        {{ __('Confirmar y Continuar') }}
                    </x-primary-button>

                    </div>
                </div>
            </x-slot>
        </div>
        </div>

     <!-- Sección 3 -->
        <div x-show="currentSection === 3">
        <div class="container">
            <h1>INSTITUTO SUPERIOR ADVENTISTA DE MISIONES</h1>
            <h2>VIDA ESTUDIANTIL</h2>

        <!-- Mensaje de advertencia -->
        <div class="p-4 bg-gray-100 border border-gray-400 mb-4">
            <strong>IMPORTANTE:</strong> Los Estudiantes solteros menores de 20 años que no residan en el hogar paterno o familiares directos (abuelos o hermanos con familia constituida) deberán vivir en las residencias del ISAM (al momento de la matriculación deberán tener 20 años cumplidos).
        </div>

        <!-- Opciones de hospedaje -->
        <div class="mb-4">
            <label>
                <input type="checkbox" name="residencia_isam" value="yes">
                Solicito hospedarme en las residencias del ISAM (Se admite el ingreso como estudiante residente hasta los 24 años).
            </label>
            <br>
            <label>
                <input type="checkbox" name="residencia_isam" value="no" @click="showAdditionalFields = !showAdditionalFields">
                No solicito hospedarme en las residencias del ISAM
            </label>
        </div>

        <!-- Opciones adicionales si no se hospeda en el ISAM -->
        <div x-show="showAdditionalFields" class="p-4 bg-gray-50 border border-gray-400">
            <div class="mb-2">
                <label>
                    <input type="checkbox" name="edad" value="mayor_20">
                    Soy mayor de 20 años
                </label>
            </div>
            <div class="mb-2">
                <label>
                    <input type="checkbox" name="edad" value="menor_20">
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
                    <x-input-label for="direccion" :value="__('Dirección')" />
                    <x-text-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" />
                </div>
                <div>
                    <x-input-label for="email" :value="__('Correo electrónico')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" />
                </div>
                <div>
                    <x-input-label for="vinculo_familiar" :value="__('¿Cuál es el vínculo familiar?')" />
                    <x-text-input id="vinculo_familiar" class="block mt-1 w-full" type="text" name="vinculo_familiar" />
                </div>
            </div>
        </div>

        <!-- Botón para continuar -->
        <div class="text-center mt-6">
            <x-primary-button @click="currentSection = 4">
                {{ __('Continuar') }}
            </x-primary-button>
        </div>
    </div>
    </div>
</x-form>

