<div class="w-full">
        <x-card title="Generar inspeccion">
            <form wire:submit.prevent="GenerarInspeccion">

           
                <x-textarea class="mb-3 mt-10" rows="5" label="nota" placeholder="nota" wire:model="nota"></x-textarea>
                <x-datetime-picker class="mt-10 mb-10"
                wire:model="fecha_inspeccion"
                label="seleccionar fecha para la inspeccion"
                parse-format="YYYY-MM-DD HH:mm:ss"
                display-format="DD/MM/YYYY HH:mm:ss"
                placeholder="xx/xx/xxxx"
                :min="now()"
                />     
                <div class="flex items-center justify-end gap-3">
                    <x-button negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                    <x-boton label="generar inspección" type="GenerarInspeccion">Generar inspección</x-boton>
                </div>
            </form>  
        </x-card>
        

</div>