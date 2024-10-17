<x-layout>
    <x-titulo>Supervisor: {{ $supervisor['Especialidad'] }}</x-titulo>
    <div class="mt-4">
        <h2>{{ $supervisor['Especialidad'] }}</h2>
        <p>Fecha_contratacion: {{ $supervisor['Fecha_contratacion'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
            <a href="/supervisor/{{ $supervisor['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar el Supervisor</a>
            <form method="POST" supervisor="/supervisor/{{ $supervisor['id'] }}" id="form-eliminar">
                @csrf
                @method('DELETE')
                <button class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar el Supervisor</button>
            </form>
    </div>
    </x-layout>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            // Desactivar el envio automatico del formulario
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar el supervisor?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                // Enviar el formulario para que sea procesado
                formEliminar.submit();
            }
        });
    </script>

