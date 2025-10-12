@if($user)
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold text-gray-800 mb-2">Información del Usuario</h2>
    <p class="text-gray-600">Nombre completo: {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
    <p class="text-gray-600">Email: {{ Auth::user()->email }}</p>
</div>
@else
    <p class="text-gray-600">No se encontró información del usuario.</p>
@endif
