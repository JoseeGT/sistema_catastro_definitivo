<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl text-gray-900 font-bold">
            Calculo
        </h2>
    </x-slot>
    <div class="flex gap-48 w-full items-end  ">
        <x-boton class="max-h-10 min-w-28" onclick="Livewire.dispatch('openModal', { component: 'create-calculo' })">Generar Calculo</x-boton>
        <livewire:calculo-report/>
    </div>

    <div class="bg-white p-2 rounded-lg mt-10">
        <livewire:calculos-table/>
        </div>
    </x-app-layout>
