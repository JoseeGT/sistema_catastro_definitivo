<div>
    <x-card class=" max-w-xl class" shadow="xl" title="Crear sector/calle">
        <form wire:submit="submit">
            <div class="flex gap-3">
                <x-select class="basis-2/5" wire:model="tipo"
                label="Tipo*"
                placeholder="sector/calle"
                :options="['sector', 'calle']"/>


            <x-input  label="nombre*" placeholder="Nombre del propietario" wire:model.alive="nombre"/>
            </div>

            <div class="flex justify-between mt-3 gap-5">
                <x-button flat negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                <x-button label="Crear" type="submit"/>


            </div>
        </form>
        
        
    </x-card>
</div>