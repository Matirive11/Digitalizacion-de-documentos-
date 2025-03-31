<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-gray-800 text-center">Panel de Administración</h2>
    <p class="text-gray-600 text-center">Aquí puedes gestionar usuarios, inscripciones y más.</p>

    <div class="flex justify-center gap-4 mt-4">
        <a href="{{ route('users.index') }}" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-md hover:bg-blue-700 transition duration-300">
            Gestionar Usuarios
        </a>
        <a href="{{ route('inscripciones.index') }}" class="bg-green-600 text-white font-bold py-2 px-6 rounded-md hover:bg-green-700 transition duration-300">
            Ver Inscripciones
        </a>
        <a href="{{ route('inscripciones.estadistica') }}" class="bg-green-600 text-white font-bold py-2 px-6 rounded-md hover:bg-green-700 transition duration-300">
            Ver Estadistica
        </a>
    </div>
</div>

