<x-layout>
    <x-titulo>Asignar supervisor</x-titulo>
    <form action="/supervisor" method="POST">
        @csrf
        <div class="flex flex-col mb-4">
            <label for="usuario_id">Usuario:</label>
            <select name="usuario_id" id="usuario_id">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex flex-col mb-4">
            <label for="area_id">Área de supervisión:</label>
            <select name="area_id" id="area_id">
                @foreach($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->nombre }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Asignar supervisor" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
