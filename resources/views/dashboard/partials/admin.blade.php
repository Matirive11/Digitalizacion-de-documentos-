<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-gray-800">Panel de Administración</h2>
    <p class="text-gray-600">Aquí puedes gestionar usuarios, inscripciones y más.</p>

    <div class="flex flex-wrap gap-4 mt-4">
        <a href="{{ route('users.index') }}" class="bg-blue-600 text-white font-bold py-2 px-6 rounded-md hover:bg-blue-700 transition duration-300">
            Gestionar Usuarios
        </a>
        <a href="{{ route('inscripciones.index') }}" class="bg-green-600 text-white font-bold py-2 px-6 rounded-md hover:bg-green-700 transition duration-300">
            Ver Inscripciones
        </a>
    </div>
</div>
