<div>

    <x-card class=" max-w-xl class" shadow="xl" title="Registrar Usuario">
        <form wire:submit="submit">
            <x-input icon="user" class="my-2" label="Nombre del usuario*" placeholder="Nombre Completo" wire:model.live="nombre"/>
 
            <div class="my-2 flex gap-3">
                <div class=" basis-4/12 my-2">
                    <x-native-select wire:model="tipo_documento"
                        label="Tipo de Documento*"
                        placeholder="seleccione el tipo"
                        :options="['V-', 'E-', 'J-', 'P-', 'G-']"/>
                </div>
                
                <div class="basis-8/12 my-2">
                    <x-maskable type="text" icon="identification" label="documento*" placeholder="documento" wire:model.live="documento"  id="multiple"    mask="##########"
                    />
                </div>
            </div>
            <div class="my-2 flex gap-3">
                <div class=" basis-4/12 my-2">
                    <x-native-select wire:model.alive="codigo_telefono"
                        label="codigo de telefono"
                        placeholder="seleccione el codigo"
                        :options="['0412','0414','0416','0424','0243']"/>
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
            <x-select class="mb-5 " wire:model.alive="rol"
            label="Rol del Usuario*"
            placeholder="seleccione"
            :options="['director', 'subdirector', 'funcionario', 'inspector']"/>


            <div class="flex justify-end gap-3">
                <x-button negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                <x-boton label="Crear Usuario" type="submit">Registrar</x-boton>
            </div>

        </form>
        
        
    </x-card>
</div>
