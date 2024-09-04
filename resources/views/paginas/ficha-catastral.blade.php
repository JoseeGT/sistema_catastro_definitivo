<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl text-gray-900 font-bold">
            Ficha Catastral
        </h2>
    </x-slot>
    <x-boton onclick="Livewire.dispatch('openModal', { component: 'create-ficha' })">Generar Ficha</x-boton>
    
    <div class="bg-white p-2 rounded-lg mt-10">

        <livewire:ficha-table/>

    </div>
    
     
</x-app-layout>
