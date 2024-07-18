<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Base de datos
        </h2>
    </x-slot>
    
    {{-- <livewire:create-propietario /> --}}
    <livewire:backup-restore/>
</x-app-layout>
