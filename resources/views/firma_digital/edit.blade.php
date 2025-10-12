<x-layout>
    <x-titulo>Editar firma digital: {{ $firmaDigital['nombre'] }}</x-titulo>
    <form action="{{ route('firma-digital.update', $firmaDigital['id']) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ $firmaDigital['nombre'] }}">
        </div>

        <div class="flex flex-col mb-4">
            <label for="ruta">Ruta de almacenamiento:</label>
            <input type="text" name="ruta" id="ruta" value="{{ $firmaDigital['ruta'] }}" readonly>
            <small>La ruta no puede ser editada.</small>
        </div>

        <input type="submit" value="Guardar" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
