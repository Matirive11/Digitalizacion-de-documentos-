<x-layout>
@php
   $analista = 0;
   $enfermeria = 0;
@endphp
@foreach ($admissions as $admission)

    @if ($admission->carrera_interes == 'analista_sistemas')
       @php
           $analista = $analista + 1
       @endphp
    @else
        @php
            $enfermeria = $enfermeria + 1
        @endphp
    @endif
@endforeach
<p>El valor de analista es {{$analista}}</p>
<p>El valor de enfermeria es {{$enfermeria}}</p>
</x-layout>
