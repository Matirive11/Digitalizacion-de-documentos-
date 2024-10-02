<x-layout>
    <x-titulo>Permisos: {{ $permiso['nombre'] }}</x-titulo>
    <div class="mt-4">
        <h2>{{ $permiso['nombre'] }}</h2>
        <p>Descripcion: {{ $permiso['descripcion'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
            <a href="/permiso/{{ $permiso['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar el permiso</a>
            <form method="POST" permiso="/permiso/{{ $permiso['id'] }}" id="form-eliminar">
                @csrf
                @method('DELETE')
                <button class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar el permiso</button>
            </form>
    </div>
    </x-layout>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            // Desactivar el envio automatico del formulario
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar el permiso?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                // Enviar el formulario para que sea procesado
                formEliminar.submit();
            }
        });
    </script>

