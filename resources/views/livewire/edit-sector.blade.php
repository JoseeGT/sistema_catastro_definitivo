<div>
    <x-card class=" max-w-xl class" shadow="xl" title="Editar Sector">
        <form wire:submit="submit">

            <x-input  label="nombre*" placeholder="Nombre del propietario" wire:model.alive="nombre"/>

            <div class="flex justify-end mt-3 gap-3">
                <x-button negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                <x-boton label="Crear" type="submit">Editar</x-boton>
            </div>
        </form>
        
        
    </x-card>
</div>