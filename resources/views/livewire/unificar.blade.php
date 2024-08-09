<div>
    <x-card title="Unificar">
        <form wire:submit.prevent="submit">
            <x-select 
                class="mb-3"
                multiselect
                label="Inmuebles"
                placeholder="Selecciona un inmueble"
                :async-data="route('api.inmuebles.index')"
                option-description="descripcion"
                option-label="codigo_catastral"
                option-value="id"
                wire:model.live="inmuebles_ids"
            />

            <div class="flex justify-end gap-5">
                <x-boton label="dividir" type="submit">Unificar</x-boton>

            </div>
        </form>
    </x-card>
</div>
