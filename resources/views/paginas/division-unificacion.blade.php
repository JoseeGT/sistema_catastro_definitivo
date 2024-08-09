<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
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
