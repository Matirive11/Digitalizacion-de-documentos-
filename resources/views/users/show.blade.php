<x-layout>
    <x-titulo>Usuario: {{ $user->first_name }} {{ $user->last_name }}</x-titulo>

    <div class="mt-4">
        <p>ID: {{ $user->id }}</p>
        <p>Nombre: {{ $user->first_name }} {{ $user->last_name }}</p>
        <p>Email: {{ $user->email }}</p>
        <p>Rol:
            @foreach($user->roles as $role)
                {{ $role->name }}@if(!$loop->last), @endif
            @endforeach
        </p>
        <p>Fecha de creación: {{ $user->created_at->format('d-m-Y H:i:s') }}</p>
    </div>

    <div class="mt-6 flex gap-x-6">
        <a href="{{ route('users.edit', $user->id) }}" class="p-4 bg-blue-200 text-blue-900">Editar usuario</a>

        <form method="POST" action="{{ route('users.destroy', $user->id) }}" id="form-eliminar">
            @csrf
            @method('DELETE')
            <button type="submit" class="p-3 text-red-800 font-bold flex items-center gap-x-2" id="boton-eliminar">
                <i class="fas fa-trash-alt"></i> <!-- Icono de eliminar -->
                <span>Eliminar</span>
            </button>
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
