<x-layout>
    <x-titulo>Firma Digital: {{ $firma['nombre'] }}</x-titulo>
    <div class="mt-4">
        <p>Nombre de la firma: {{ $firma['nombre'] }}</p>
        <p>Usuario: {{ $firma['usuario_id'] }}</p>
        <p>Ruta del archivo de firma: {{ $firma['archivo_firma'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
        <a href="/firma-digital/{{ $firma['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar firma digital</a>
        <form method="POST" action="/firma-digital/{{ $firma['id'] }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar firma digital</button>
        </form>
    </div>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar la firma digital?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                formEliminar.submit();
            }
        });
    </script>
</x-layout>
