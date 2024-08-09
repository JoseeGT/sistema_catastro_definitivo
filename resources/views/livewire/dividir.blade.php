<div>
    <x-card title="Dividir">
        <form wire:submit.prevent="submit">

        <x-select class="mb-3"
        label="Inmueble"
        placeholder="Selecciona un inmueble"
        :async-data="route('api.inmuebles.index')"
        option-description="descripcion"
        option-label="codigo_catastral"
        option-value="id"
        wire:model.live="inmueble_id"
    />

        <x-input class="mb-3" label="num de lotes" placeholder="num de lotes" wire:model="num_lotes"></x-input>

        <div class="flex justify-end gap-5">
            <x-boton label="dividir" type="submit">dividir</x-boton>
        </div>
    </form>

    </x-card>
 </div>
