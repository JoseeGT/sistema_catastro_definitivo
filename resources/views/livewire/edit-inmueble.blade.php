<div >
    <x-card  shadow="2xl" title="Editar inmueble">
        <form wire:submit.prevent="submit">
            <div class="flex gap-1 py-2">

                <x-input label="sec*" placeholder="000" wire:model="sec" mask="###" />
                <x-maskable label="man" placeholder="000" wire:model="man" mask="###" />
                <x-maskable label="par" placeholder="000" wire:model="par" mask="###" />
                <x-maskable label="sbp" placeholder="000" wire:model="sbp" mask="###" />
                <x-maskable label="niv" placeholder="000" wire:model="niv" mask="###" />
                <x-maskable label="uni" placeholder="000" wire:model="uni" mask="###" />
            </div>

            <div>
                <x-select
                    label="buscar Propietario"
                    placeholder="seleccione"
                    :async-data="route('api.propietarios.index')"
                    option-label="nombre"
                    option-description="descripcion"
                    option-value="id"
                    wire:model="propietario_id"
                />
            </div>
            <div class="flex gap-2 py-2">
                <x-select
                    label="buscar sectores"
                    placeholder="seleccione"
                    :async-data="route('api.sectores.index')"
                    option-label="nombre"
                    option-value="id"
                    wire:model="sector_id"
                />
                <x-select
                label="buscar calles"
                placeholder="seleccione"
                :async-data="route('api.calles.index')"
                option-label="nombre"
                option-value="id"
                wire:model="calle_id"
            />
            </div>
            
            <div class="flex gap-2 py-2">
                <x-input label="Numero Civico" placeholder="Ingrese el numero" wire:model="numero_civico" ></x-input>
                <x-input label="Nota de la direccion" placeholder="Nota" wire:model="nota"></x-input>
            </div>
            <div class="grid grid-cols-2 gap-2 my-5">   
                <x-input label="Area Terreno" placeholder="Mts2" wire:model="area_terreno" ></x-input>
                {{-- <x-input label="Area Terreno SD" placeholder="Mts2" wire:model="area_terreno_sd" ></x-input> --}}
                <x-input label="Area Construccion" placeholder="Mts2" wire:model="area_construccion" ></x-input>
                {{-- <x-input label="Area Construccion SD" placeholder="Mts2" wire:model="area_construccion_sd" ></x-input> --}}
                <x-select label="Tenencia del terreno" wire:model="tenencia_terreno_id" placeholder="seleccione"
                :options="[
                    ['name' => 'propio', 'id' => 1],
                    ['name' => 'municipal', 'id' => 2],
                    ['name' => 'inavi', 'id' => 3],
                    ['name' => 'gobernacion', 'id' => 4],
                    ['name' => 'intu', 'id' => 5],
                ]" option-label="name" option-value="id"/>
                 
                <x-select label="Tipo de construccion" wire:model="tipo_construccion_id" placeholder="seleccione"
                :options="[
                    ['name' => 'casa', 'id' => 1],
                    ['name' => 'apartamento', 'id' => 2],
                    ['name' => 'gm vivienda', 'id' => 3],
                    ['name' => 'comercial', 'id' => 4],
                    ['name' => 'comercial Municipal', 'id' => 5]
                ]" option-label="name" option-value="id"/>
            </div>
            <x-select class="mb-5"
            label="Seleccionar estatus"
            placeholder="Seleccionar"
            :options="['ACTIVO', 'INACTIVO']"
            wire:model="estado"
        />
      
           
            <div class="flex gap-3 justify-end items-end">
                <x-button type="button" negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                @if ($inmueble->plano_path != null)
                <x-boton ><a href="{{($inmueble->plano_path)}}" target="_blank">Ver plano del Inmueble</a></x-boton>
                    @endif
                <x-boton label="Actualizar inmueble" type="submit">Actualizar inmueble</x-boton>
            </div>
        </form>
        
    </x-card>
</div>

