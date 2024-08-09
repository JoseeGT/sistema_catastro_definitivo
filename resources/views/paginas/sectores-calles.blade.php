<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sectores y Calles
        </h2>
    </x-slot>

    <x-boton onclick="Livewire.dispatch('openModal', { component: 'sectores-calles' })">registrar Sector/Calle</x-boton>
    
    <div class="grid align-content-start gap-5 grid-cols-2">
        <div class="bg-white p-2 rounded-lg">
            <livewire:sector-table/>
        </div>
        <div class="bg-white gap-4 p-2 rounded-lg">
            <livewire:calle-table/>
        </div>
    </div>

</x-app-layout>
