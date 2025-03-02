<x-layout>
    <x-titulo>Editar usuario: {{ $user->first_name }} {{ $user->last_name }}</x-titulo>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="flex flex-col mb-4">
            <label for="first_name">Nombre:</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name', $user->first_name) }}" required>
        </div>

        <div class="flex flex-col mb-4">
            <label for="last_name">Apellido:</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" required>
        </div>

        <div class="flex flex-col mb-4">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div class="flex flex-col mb-4">
            <label for="telefono">Telefono:</label>
            <input type="number" name="telefono" id="telefono" value="{{ old('telefono', $user->telefono) }}" required>
        </div>


        <div class="flex flex-col mb-4">
            <label for="roles">Roles:</label>
            <select name="roles[]" id="roles" class="form-control" multiple>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}"
                        @if($user->hasRole($role->name)) selected @endif>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <input type="submit" value="Guardar cambios" class="p-4 bg-blue-200 text-blue-900">
    </form>
</x-layout>
