
<img src="{{ asset($url) }}" alt="Imagen de logo de usuario">

<x-layout>
    <x-titulo>Archivo: {{ $archivo['nombre'] }}</x-titulo>
    <div class="mt-4">
        <p><strong>Nombre del archivo:</strong> {{ $archivo['nombre'] }}</p>
        <p><strong>Tipo:</strong> {{ $archivo['tipo'] }}</p>
        <p><strong>Ruta de almacenamiento:</strong> {{ $archivo['ruta'] }}</p>
        <p><strong>Tipo de archivo ID:</strong> {{ $archivo['id_tipo_archivo'] }}</p>
        <a href="{{ Storage::url($archivo['ruta']) }}" target="_blank" class="text-blue-500">Ver archivo</a>
    </div>
    <div class="mt-6 flex gap-x-6">
        <a href="{{ route('archivo.edit', $archivo['id']) }}" class="p-4 bg-blue-200 text-blue-900">Editar el archivo</a>
        <form method="POST" action="{{ route('archivo.destroy', $archivo['id']) }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar el archivo</button>
        </form>
    </div>
</x-layout>

<script>
    let botonEliminar = document.querySelector("#boton-eliminar");
    botonEliminar.addEventListener("click", function(e) {
        // Desactivar el envio automatico del formulario
        e.preventDefault();
        let confirmacion = confirm("¿Está seguro que desea eliminar el archivo?");
        if (confirmacion) {
            let formEliminar = document.querySelector("#form-eliminar");
            // Enviar el formulario para que sea procesado
            formEliminar.submit();
        }
    });
</script>

