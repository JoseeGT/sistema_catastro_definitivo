<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl text-gray-900 font-bold">
            Propietarios
        </h2>
    </x-slot>
    
    {{-- <livewire:create-propietario /> --}}
    @can('crear propietarios')
    <div class="flex gap-20 w-full items-end  ">
        <x-boton  class="max-h-10 max-w-28" onclick="Livewire.dispatch('openModal', { component: 'create-propietario' })">Registrar Propietario</x-boton>  
        
        <livewire:propietarios-report/>
    </div>

    @endcan
    <div class="bg-white p-2 rounded-lg mt-10">
        <livewire:propietario-table/>
        
    </div>
</x-app-layout>
