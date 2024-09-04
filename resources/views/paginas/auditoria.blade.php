<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl text-gray-900 font-bold">
            Auditoria
        </h2>
    </x-slot>
    
    {{-- <livewire:create-propietario /> --}}
    
    <div class="bg-white p-2 rounded-lg mt-10">

        <livewire:auditoria-table/>
    </div>
</x-app-layout>
