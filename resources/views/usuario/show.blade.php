<x-layout>
    <x-titulo>Usuario: {{ $usuario['Correo_electronico'] }}</x-titulo>
    <div class="mt-4">
        <h2>{{ $usuario['Correo_electronico'] }}</h2>
        <p>Contrasenia: {{ $usuario['Contrasenia'] }}</p>
        <p>Estado: {{ $usuario['Estado'] }}</p>
        <p>Fecha_creacion: {{ $usuario['Fecha_creacion'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
            <a href="/usuario/{{ $usuario['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar el usuario</a>
            <form method="POST" usuario="/usuario/{{ $usuario['id'] }}" id="form-eliminar">
                @csrf
                @method('DELETE')
                <button class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar el usuario</button>
            </form>
    </div>
    </x-layout>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            // Desactivar el envio automatico del formulario
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar el usuario?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                // Enviar el formulario para que sea procesado
                formEliminar.submit();
            }
        });
    </script>
