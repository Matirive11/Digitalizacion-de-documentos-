<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-bold text-gray-800">Panel de Supervisión</h2>
    <p class="text-gray-600">Aquí puedes revisar todas las inscripciones realizadas.</p>

    <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
        <thead>
            <tr class="bg-gray-100">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Alumno</th>
                <th class="border border-gray-300 px-4 py-2">Estado</th>
                <th class="border border-gray-300 px-4 py-2">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inscripciones as $inscripcion)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $inscripcion->id }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $inscripcion->user->name }}</td>
                    <td class="border border-gray-300 px-4 py-2">{{ $inscripcion->estado }}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('supervisor.inscripcion', $inscripcion->id) }}" class="text-blue-600">Ver Detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
