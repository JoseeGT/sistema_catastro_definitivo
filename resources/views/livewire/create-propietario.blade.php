<div>

    <x-card class=" max-w-xl class" shadow="xl" title="Registrar Propietario">
        <form wire:submit="submit">
            <x-input icon="user" class="my-2" label="nombre*" placeholder="Nombre del propietario" wire:model.live="nombre"/>
 
            <div class="my-2 flex gap-3">
                <div class=" basis-4/12 my-2">
                    <x-native-select wire:model.live="tipo_documento"
                        label="Tipo de Documento*"
                        placeholder="seleccione el tipo"
                        :options="['V-', 'E-', 'J-', 'P-', 'G-']"/>
                </div>
                
                <div class="basis-8/12 my-2">
                    <x-maskable icon="identification" type="text" label="documento*" placeholder="10000000" wire:model.live="documento"  id="multiple"    mask="##########"
                    />

                </div>
            </div>
            <div class="my-2 flex gap-3">
                <div class=" basis-4/12 my-2">
                    <x-native-select wire:model.live="codigo_telefono"
                        label="codigo de telefono"
                        placeholder="seleccione el codigo"
                        :options="['0412','0414','0416','0424','0243']"/>
                </div>
                <x-phone class=" basis-8/12 my-2"
                        id="multiple-mask"
                        wire:model.live="telefono"
                        label="telefono"
                        placeholder="123-4567"
                        icon="phone"

                        :mask="[' ###-####']"
/>  
            </div>
            
            <div class="flex justify-end gap-3">
                <x-button negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                <x-boton label="Registrar Propietario" type="submit">Registrar Propietario</x-boton>


            </div>
        </form>
        
        
    </x-card>
</div>
