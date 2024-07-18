<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Calculo
        </h2>
    </x-slot>
    <div class="flex gap-48 w-full items-end  ">
        <x-button class="max-h-10" onclick="Livewire.dispatch('openModal', { component: 'create-calculo' })">Generar Calculo</x-button>
        <livewire:calculo-report/>
    </div>

    <div class="bg-white p-2 rounded-lg mt-10">
        <livewire:calculos-table/>
        </div>
    </x-app-layout>
