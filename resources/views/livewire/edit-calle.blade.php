<div>
    <x-card class=" max-w-xl class" shadow="xl" title="Editar Calle">
        <form wire:submit="submit">

            <x-input  label="nombre*" placeholder="Nombre del propietario" wire:model.alive="nombre"/>

            <div class="flex justify-between mt-3 gap-5">
                <x-button flat negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                <x-button label="editar" type="submit"/>
            </div>
        </form>
        
        
    </x-card>
</div>