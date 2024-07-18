<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tareas
        </h2>
    </x-slot>

    <livewire:asignar-tarea/>
    <div class="bg-white p-2 rounded-lg mt-10">
        <livewire:tareas-table/>
    </div>

</x-app-layout>
