<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inmuebles
        </h2>
    </x-slot>
    
@can('crear inmuebles')
    <div class="flex gap-20 w-full items-end  ">
        <x-boton class="max-h-10"  onclick="Livewire.dispatch('openModal', { component: 'create-inmueble' })">Registrar Inmueble</x-boton>
        <livewire:inmuebles-report/>
    </div>
@endcan
    <div class="bg-white p-2 rounded-lg mt-10">
        
        <livewire:inmueble-table/>
        
    </div>

</x-app-layout>
