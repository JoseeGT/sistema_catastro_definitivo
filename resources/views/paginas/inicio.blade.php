<x-app-layout>
    <x-slot name="header">
        <h4 class="text-3xl text-gray-900 font-bold">Inicio</h4>

    </x-slot>
    <div class=" rounded-lg py-2 flex gap-3" >

        @can('tareas asignadas')
        {{-- <livewire:tareas-asignadas/> --}}

        @endcan
        <livewire:ver-tareas/>


    </div>
</x-app-layout>
