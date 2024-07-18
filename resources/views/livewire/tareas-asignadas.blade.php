<div>
    <div class="flex-1 bg-white rounded-lg shadow-xl mt-0 p-4 w-96">
        <h4 class="text-xl text-gray-900 font-bold">Tareas Vigentes</h4>
        <div class="relative px-1">
            <div class="ml-1.5 absolute h-full border border-dashed border-opacity-20 border-secondary"></div>

            @if ($tareas->count() == 0)
                <span></span>
                <p class="text-sm text-gray-500 mt-4">No hay tareas actualmente ...</p>
            @endif

            @foreach($tareas as $tarea)
                <div class="flex items-center w-full my-6 -ml-1.5">
                    <div class="w-1/12 z-10">
                        <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                    </div>
                    <div class="w-full text-wrap">
                        <p class="text-sm text-gray-900 ">Titulo: {{ $tarea->titulo }}.</p>
                        <p class="text-sm max-w-72 break-all text-gray-500">Asignado a: {{ $tarea->asignadoA->name }}</p>
                        <p class="text-sm max-w-72 break-all text-gray-500">Asignada el: {{ \Carbon\Carbon::parse($tarea->fecha_asignacion)->format('d-m-Y') }}</p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
