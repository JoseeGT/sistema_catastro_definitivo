<div>
    <x-card class="max-w-5xl" shadow="xl" title="Crear inmueble">  
        <form wire:submit.prevent="save">
            <div class="flex gap-1 py-2">
                <x-maskable  disabled label="sec*" placeholder="000" wire:model="sec" mask="###" />
                <x-maskable  disabled label="man" placeholder="000" wire:model="man" mask="###" />
                <x-maskable  disabled label="par" placeholder="000" wire:model="par" mask="###" />
                <x-maskable  disabled label="sbp" placeholder="000" wire:model="sbp" mask="###" />
                <x-maskable  disabled label="niv" placeholder="000" wire:model="niv" mask="###" />
                <x-maskable  disabled label="uni" placeholder="000" wire:model="uni" mask="###" />
            </div>
            <div class="flex gap-2 py-2">
                <x-select
                    disabled
                    label="Sector"
                    placeholder="seleccione"
                    :async-data="route('api.sectores.index')"
                    option-label="nombre"
                    option-value="id"
                    wire:model="sector_id"
                />
                <x-select
                    disabled
                    label="calle"
                    placeholder="seleccione"
                    :async-data="route('api.calles.index')"
                    option-label="nombre"
                    option-value="id"
                    wire:model="calle_id"
                />
            </div>
            <div class="flex gap-2 py-2">
                <x-input disabled label="Numero Civico" placeholder="Ingrese el numero" wire:model="numero_civico"></x-input>
                <x-input disabled label="Nota de la direccion" placeholder="Nota" wire:model="nota"></x-input>
            </div>
            <div class="grid grid-cols-2 gap-2 my-3">   
                <x-input label="Area Terreno" placeholder="introduzca el area" wire:model="area_terreno" suffix="Mts2"></x-input>
                <x-input label="Area Construccion" placeholder="introduzca el area" wire:model="area_construccion" suffix="Mts2"></x-input>
            </div>
            <div class="flex-column gap-y-3 mt-5 justify-center">
                <x-input icon="arrow-up" label="Lindero Norte" placeholder="Parcela" wire:model="lindero_norte"></x-input>
                <x-input icon="arrow-down" label="Lindero Sur" placeholder="Parcela" wire:model="lindero_sur"></x-input>
                <x-input icon="arrow-right" label="Lindero Este" placeholder="Parcela" wire:model="lindero_este"></x-input>
                <x-input icon="arrow-left" label="Lindero Oeste" placeholder="Parcela" wire:model="lindero_oeste"></x-input>
            </div>

            <x-input type="file" class="mb-3" label="Plano" placeholder="" wire:model.live="plano"></x-input>
            {{-- <x-boton type="button" class="mb-10"><a href="{{ $planoPreviewUrl }}" target="_blank">Ver plano del Inmueble</a>
            </x-boton> --}}
            @if ($planoPreviewUrl)
            <iframe class="mb-3" src="{{ $planoPreviewUrl }}" width="100%" height="600px"></iframe>
            @endif

            <div class="flex justify-end gap-3">
                <x-button class="max-h-12 min-w-28 text-center" negative wire:click="$dispatch('closeModal')" label="cancelar"/>
                <div>
                    <x-button class="max-h-12 max-w-28 text-center"  label="completar inspeccion" type="save"/>
                </div>
            </div>
        </form>
    </x-card>
</div>

