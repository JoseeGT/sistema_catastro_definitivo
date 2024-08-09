<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Usuarios
        </h2>
    </x-slot>
    <x-boton onclick="Livewire.dispatch('openModal', { component: 'create-usuario' })">Registrar usuario</x-boton>
    

    
    <div class="bg-white p-2 rounded-lg mt-10">
        <livewire:user-table/>
        
    </div>
</x-app-layout>
