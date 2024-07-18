<div>

    <x-card class=" max-w-xl class" shadow="xl" title="Crear Propietario">
        <form wire:submit="submit">
            <x-input class="my-2" label="nombre*" placeholder="Nombre del propietario" wire:model.live="nombre"/>
 
            <div class="my-2 flex gap-3">
                <div class=" basis-4/12 my-2">
                    <x-native-select wire:model.live="tipo_documento"
                        label="Tipo de Documento*"
                        placeholder="seleccione el tipo"
                        :options="['V-', 'E-', 'J-', 'P-', 'G-']"/>
                </div>
                
                <div class="basis-8/12 my-2">
                    <x-maskable type="text" label="documento*" placeholder="documento" wire:model.live="documento"  id="multiple"    mask="##########"
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
                        placeholder="telefono del propietario"
                        :mask="[' ###-####']"
/>
            </div>
            
            <div class="flex justify-between gap-5">
                <x-button flat negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                <x-button label="Crear Propietario" type="submit"/>


            </div>
        </form>
        
        
    </x-card>
</div>
