<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl text-gray-900 font-bold">
            Tareas
        </h2>
    </x-slot>

    <livewire:asignar-tarea/>
    <div class="bg-white p-2 rounded-lg mt-10">
        <livewire:tareas-table/>
    </div>

</x-app-layout>
