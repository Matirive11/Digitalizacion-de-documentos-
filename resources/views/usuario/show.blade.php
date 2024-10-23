<x-layout>
    <x-titulo>Usuario: {{ $usuario['nombre'] }}</x-titulo>
    <div class="mt-4">
        <p>ID: {{ $usuario['id'] }}</p>
        <p>Nombre: {{ $usuario['nombre'] }}</p>
        <p>Email: {{ $usuario['email'] }}</p>
        <p>Rol: {{ $usuario['rol'] }}</p>
        <p>Fecha de creación: {{ $usuario['created_at'] }}</p>
    </div>
    <div class="mt-6 flex gap-x-6">
        <a href="/usuario/{{ $usuario['id'] }}/edit" class="p-4 bg-blue-200 text-blue-900">Editar usuario</a>
        <form method="POST" action="/usuario/{{ $usuario['id'] }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-4 text-red-800 font-bold" id="boton-eliminar">Eliminar usuario</button>
        </form>
    </div>
    <script>
        let botonEliminar = document.querySelector("#boton-eliminar");
        botonEliminar.addEventListener("click", function(e) {
            e.preventDefault();
            let confirmacion = confirm("¿Está seguro que desea eliminar el usuario?");
            if(confirmacion) {
                let formEliminar = document.querySelector("#form-eliminar");
                formEliminar.submit();
            }
        });
    </script>
</x-layout>
