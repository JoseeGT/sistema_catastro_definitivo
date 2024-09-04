<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl text-gray-900 font-bold">
            Division y Unificación
        </h2>
    </x-slot>

    <livewire:dividir/>
    <div class="bg-white p-2 rounded-lg mt-10"> 
        <livewire:divisiones-table/>
    </div>
    <livewire:unificar/>
    <div class="bg-white p-2 rounded-lg mt-10"> 
        <livewire:unificaciones-table/>
    </div></x-app-layout>
