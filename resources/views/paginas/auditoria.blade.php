<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Auditoria
        </h2>
    </x-slot>
    
    {{-- <livewire:create-propietario /> --}}
    
    <div class="bg-white p-2 rounded-lg mt-10">

        <livewire:auditoria-table/>
    </div>
</x-app-layout>
