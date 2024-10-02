<x-layout>
    <x-titulo>Rol: {{ $roles['nombre'] }}</x-titulo>
    <div class="mt-4">
        <h2>{{ $roles['nombre'] }}</h2>
        <p>Descripcion: {{ $roles['descripcion'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
            <a href="/rol/{{ $roles['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar el rol</a>
            <form method="POST" rol="/rol/{{ $roles['id'] }}" id="form-eliminar">
                @csrf
                @method('DELETE')
                <button class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar el rol</button>
            </form>
    </div>
    </x-layout>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            // Desactivar el envio automatico del formulario
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar el rol?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                // Enviar el formulario para que sea procesado
                formEliminar.submit();
            }
        });
    </script>
    
    