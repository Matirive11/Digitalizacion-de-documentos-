<x-layout>
    <x-titulo>Personas: {{ $persona['nombre'] }}</x-titulo>
    <div class="mt-4">
        <h2>{{ $persona['dni'] }}</h2>
        <p>Nombre: {{ $persona['nombre'] }}</p>
        <p>Apellido: {{ $persona['apellido'] }}</p>
        <p>Email: {{ $persona['email'] }}</p>
        <p>Telefono: {{ $persona['telefono'] }}</p>
        <p>Fecha de nacimiento: {{ $persona['fecha_nacimiento'] }}</p>

    </div>
    <div class="mt-6 flex gap-x-6">
            <a href="/persona/{{ $persona['dni'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar la persona</a>
            <form method="POST" persona="/persona/{{ $persona['dni'] }}" dni="form-eliminar">
                @csrf
                @method('DELETE')
                <button class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar la persona</button>
            </form>
    </div>
    </x-layout>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            // Desactivar el envio automatico del formulario
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar la persona?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                // Enviar el formulario para que sea procesado
                formEliminar.submit();
            }
        });
    </script>

