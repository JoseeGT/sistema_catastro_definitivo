<div>

    <x-card class=" max-w-xl class" shadow="xl" title="Crear Usuario">
        <form wire:submit="submit">
            <x-input  icon="user" class="my-2" label="Nombre del usuario*" placeholder="Nombre Completo" wire:model.alive="nombre"/>
 
            <div class="my-2 flex gap-3">
                <div class=" basis-4/12 my-2">
                    <x-native-select wire:model="tipo_documento"
                        label="Tipo de Documento*"
                        placeholder="seleccione el tipo"
                        :options="['V-', 'E-', 'J-', 'P-', 'G-']"/>
                </div>
                
                <div class="basis-8/12 my-2">
                    <x-input type="text" icon="identification" label="documento*" placeholder="documento" wire:model.alive="documento"/>

                </div>
            </div>
            <div class="my-2 flex gap-3">
                <div class=" basis-4/12 my-2">
                    <x-native-select wire:model.alive="codigo_telefono"
                        label="codigo de telefono"
                        placeholder="seleccione el codigo"
                        :options="['0414', '0424', '0412', '0416']"/>
                </div>
                <x-phone class=" basis-8/12 my-2"
                        id="multiple-mask"
                        icon="phone"

                        wire:model.alive="telefono"
                        label="telefono"
                        placeholder="telefono del propietario"
                        :mask="[' ###-####']"
/>
            </div>
            <x-input class="my-2" type="password" label="Contraseña*" placeholder="********" wire:model.alive="password"/>
            <x-input  class="my-2 " type="text" label="Correo Electronico*" placeholder="ejemplo@ejemplo.com" wire:model.alive="email"/>

            <x-native-select wire:model="estado"
            label="Estado"
            placeholder="selecciona el estado del propietario"
            :options="['ACTIVO', 'INACTIVO']"/>

            <div class="flex mt-5 justify-end gap-3">
                <x-button  negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                <x-button class="min-w-24" label="Editar" type="submit"/>


            </div>


        </form>
        
        
    </x-card>
</div>
