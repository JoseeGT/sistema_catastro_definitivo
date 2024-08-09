<div>
    <x-card class=" max-w-2xl " shadow="xl" title="Registrar inmueble">
        <form wire:submit.prevent="submit">
            <div class="flex gap-1 py-2">

                <x-maskable label="sec*" placeholder="000" wire:model="sec" mask="###" />
                <x-maskable label="man" placeholder="000" wire:model="man" mask="###" />
                <x-maskable label="par" placeholder="000" wire:model="par" mask="###" />
                <x-maskable label="sbp" placeholder="000" wire:model="sbp" mask="###" />
                <x-maskable label="niv" placeholder="000" wire:model="niv" mask="###" />
                <x-maskable label="uni" placeholder="000" wire:model="uni" mask="###" />
            </div>
            
            <div class="flex gap-2 py-2 items-end">
                <x-select
                    label="buscar Propietario"
                    placeholder="seleccione"
                    :async-data="route('api.propietarios.index')"
                    option-label="nombre"
                    option-description="descripcion"
                    option-value="id"
                    wire:model="propietario_id"
                />
                <x-boton class="max-h-10" wire:click="$dispatch('openModal', { component: 'create-propietario'})">Registrar usuario</x-boton>
   
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
            <div class="grid grid-cols-2 gap-2 my-7">   
                <x-input label="Area Terreno" placeholder="introduzca el area" wire:model="area_terreno"     suffix="Mts2"
                ></x-input>
                {{-- <x-input label="Area Terreno SD" placeholder="introduzca el area" wire:model="area_terreno_sd" suffix="Mts2"></x-input> --}}
                <x-input label="Area Construccion" placeholder="introduzca el area" wire:model="area_construccion" suffix="Mts2" ></x-input>
                {{-- <x-input label="Area Construccion SD" placeholder="introduzca el area" wire:model="area_construccion_sd" suffix="Mts2"></x-input> --}}
                <x-select label="Tenencia del terreno" wire:model="tenencia_terreno_id" placeholder="seleccione">
                    <x-select.option label="propio" value="1" />
                    <x-select.option label="municipal" value="2" />
                    <x-select.option label="inavi" value="3" />
                    <x-select.option label="gobernacion" value="4" />
                    <x-select.option label="intu" value="5" />
                </x-select>
                <x-select label="Tipo de construccion" wire:model="tipo_construccion_id" placeholder="seleccione">
                    <x-select.option label="casa" value="1" />
                    <x-select.option label="apartamento" value="2" />
                    <x-select.option label="gm vivienda" value="3" />
                    <x-select.option label="comercial" value="4" />
                    <x-select.option label="comercial municipal" value="5" />
                </x-select>
            </div>
     
            <div class="flex justify-end gap-3">
                <x-button class="h-10" negative wire:click="$dispatch('closeModal')" label="Cancelar"/>

                <x-boton class="h-10" label="Registrar inmueble" type="submit"> Registrar inmueble</x-boton>
            </div>
        </form>
        
    </x-card>
</div>



{{-- 
<div>
    <x-card class=" max-w-2xl " shadow="xl" title="Registrar inmueble">
        <form wire:submit.prevent="submit">
            <div class="flex gap-1 py-2">

                <x-maskable label="sec*" placeholder="000" wire:model="sec" mask="###" />
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
                    option-description="documento"
                    option-value="id"
                    wire:model="propietario_id"
                />
            </div>
            
            <div class="grid grid-cols-2 gap-2 my-7">   
                <x-input label="Area Terreno" placeholder="Mts2" wire:model="area_terreno" ></x-input>
                <x-input label="Area Construccion" placeholder="Mts2" wire:model="area_construccion" ></x-input>
                <x-input label="Area Terreno SD" placeholder="Mts2" wire:model="area_terreno_sd" ></x-input>
                <x-input label="Area Construccion SD" placeholder="Mts2" wire:model="area_construccion_sd" ></x-input>
                <x-select label="Tenencia del terreno" placeholder="seleccione">
                    <x-select.option label="propio" value="1" />
                    <x-select.option label="municipal" value="2" />
                    <x-select.option label="inavi" value="3" />
                    <x-select.option label="gobernacion" value="4" />
                    <x-select.option label="intu" value="5" />
                </x-select>
                <x-select label="Tipo de construccion" placeholder="seleccione">
                    <x-select.option label="casa" value="1" />
                    <x-select.option label="apartamento" value="2" />
                    <x-select.option label="gm vivienda" value="3" />
                    <x-select.option label="comercial" value="4" />
                    <x-select.option label="comercial municipal" value="5" />
                </x-select>
            </div>

            <div class="flex-column gap-y-3 mt-5 mb-7 justify-center">
                <x-input label="Lindero Norte" placeholder="Parcela" wire:model="Lindero_norte" ></x-input>
                <x-input label="Lindero Sur" placeholder="Parcela" wire:model="Lindero_sur" ></x-input>
                <x-input label="Lindero Este" placeholder="Parcela" wire:model="Lindero_este" ></x-input>
                <x-input label="Lindero Oeste" placeholder="Parcela" wire:model="Lindero_oeste" ></x-input> 

            </div>

            <div class="grid grid-cols-2 grid-rows-* mb-7 gap-2">
                
                <x-textarea label="Tipo de operacion" wire:model="tipo_operacion" ></x-input>
                <x-datetime-picker
                wire:model="fecha"
                label="Fecha del documento"
                placeholder="xx/xx/xxxx"
                without-timezone
                without-time	
                />                
                <x-input label="Num" placeholder="Num" wire:model="num" ></x-input>
                <x-input label="Folio" placeholder="Folio" wire:model="folio" ></x-input>
                <x-input label="Protocolo" placeholder="Protocolo" wire:model="protocolo" ></x-input>
                <x-input label="Matricula" placeholder="Matricula" wire:model="matricula" ></x-input>
                <x-input label="Trimestre" placeholder="Trimestre" wire:model="trimestre" ></x-input>
                <x-input label="Observaciones" placeholder="observaciones" wire:model="observaciones" ></x-input>
            </div>

            <div class="flex justify-end">

                <x-button label="Registrar inmueble" type="submit"/>
            </div>
        </form>
        
    </x-card>
</div>
 --}}