<form action="{{ route('archivo.store') }}" method="POST" class="my-10" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="archivo">Archivo</label>
            {{-- El tipo de input para subir archivos es file --}}
            <input type="file" name="archivo" id="archivo">
            @error('archivo')
                <p class="text-red-800">{{ $message }}</p>
            @enderror
            @if (session('exito'))
            <p>{{ session('exito') }}</p>
        @endif
        </div>
        <div class="mt-5">
            <input type="submit" value="Guardar" class="p-3 text-blue-900 bg-blue-200 rounded">
        </div>
    </form>
