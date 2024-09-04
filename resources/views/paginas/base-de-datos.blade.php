<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-gray-800">
            Base de datos
        </h2>
    </x-slot>
    
    
    {{-- <livewire:create-propietario /> --}}
    <livewire:backup-restore/>
</x-app-layout>
