<div>
    <x-card class=" max-w-xl class" shadow="xl" title="Registrar sector/calle">
        <form wire:submit="submit">
            <div class="flex gap-3">
                <x-select class="basis-2/5" wire:model="tipo"
                label="Tipo*"
                placeholder="sector/calle"
                :options="['sector', 'calle']"/>


            <x-input  label="nombre*" placeholder="Nombre del sector/calle" wire:model.alive="nombre"/>
            </div>

            <div class="flex justify-end mt-3 gap-3">
                <x-button negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                <x-boton label="Crear" type="submit">Registrar</x-boton>


            </div>
        </form>
        
        
    </x-card>
</div>