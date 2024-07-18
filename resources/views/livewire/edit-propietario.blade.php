<div>
    <x-card title="Editar Propietario">
        <form wire:submit.prevent="submit">
            <x-input label="nombre*" placeholder="Nombre del propietario" wire:model="nombre"/>
 
            <div class="flex gap-1">
                <div class=" basis-4/12 my-2">
                    <x-native-select wire:model="tipo_documento"
                        label="Tipo de Documento*"
                        placeholder="seleccione el tipo"
                        :options="['V-', 'E-', 'J-', 'P-', 'G-']"/>
                </div>
                
                <div class="basis-8/12 my-2">
                    <x-input type="text" label="documento*" placeholder="documento" wire:model="documento"/>
                </div>
            </div>
            <div class="flex gap-1">
                <div class=" basis-4/12 my-2">
                    <x-native-select wire:model="codigo_telefono"
                        label="codigo de telefono"
                        placeholder="seleccione el codigo"
                        :options="['0414', '0416', '0424', '0426']"/>
                </div>
                <x-phone class=" basis-8/12 my-2"
                        id="multiple-mask"
                        wire:model="telefono"
                        label="telefono"
                        placeholder="telefono del propietario"
                        :mask="[' ###-####']"/>
            </div>
            <div class="my-2">
                <x-native-select wire:model="estado"
                    label="Estado"
                    placeholder="selecciona el estado del propietario"
                    :options="['ACTIVO', 'INACTIVO']"/>
            </div>
            <div class="flex items-center justify-between">
                <x-button flat negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                <x-button label="Actualizar Propietario" type="submit"/>
            </div>

        </form>       
    </x-card>
</div>
