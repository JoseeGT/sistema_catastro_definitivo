<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ficha Catastral
        </h2>
    </x-slot>
    <x-button onclick="Livewire.dispatch('openModal', { component: 'create-ficha' })">Generar Ficha</x-button>
    
    <div class="bg-white p-2 rounded-lg mt-10">

        <livewire:ficha-table/>

    </div>
    
     
</x-app-layout>
