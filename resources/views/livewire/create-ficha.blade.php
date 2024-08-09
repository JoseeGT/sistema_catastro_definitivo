<div>
    <x-card class=" max-w-5xl " shadow="xl" title="Generar Ficha">
        <div class="flex gap-2 items-end">
            <x-select
            label="Inmueble"
            placeholder="Selecciona un inmueble"
            :async-data="route('api.inmuebles.index')"
            option-description="descripcion"
            option-label="codigo_catastral"
            option-value="id"
            wire:model.live="inmueble_id"
        />
    
        <x-boton class="h-10" wire:click="loadInmuebleData({{ $inmueble_id }})"> Cargar Inmueble</x-boton>

        </div>    
        <form wire:submit.prevent="submit">
            <div class="flex gap-1 py-2">

                <x-maskable   label="sec*" placeholder="000" wire:model="sec" mask="###" />
                <x-maskable   label="man" placeholder="000" wire:model="man" mask="###" />
                <x-maskable   label="par" placeholder="000" wire:model="par" mask="###" />
                <x-maskable   label="sbp" placeholder="000" wire:model="sbp" mask="###" />
                <x-maskable   label="niv" placeholder="000" wire:model="niv" mask="###" />
                <x-maskable   label="uni" placeholder="000" wire:model="uni" mask="###" />
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
                    
                    label="Sector"
                    placeholder="seleccione"
                    :async-data="route('api.sectores.index')"
                    option-label="nombre"
                    option-value="id"
                    wire:model="sector_id"
                />
                <x-select
                
                label="  calle"
                placeholder="seleccione"
                :async-data="route('api.calles.index')"
                option-label="nombre"
                option-value="id"
                wire:model="calle_id"
            />
            
            </div>
            <div class="flex gap-2 py-2">
                <x-input  label="Numero Civico" placeholder="Ingrese el numero" wire:model="numero_civico" ></x-input>
                <x-input  label="Nota de la direccion" placeholder="Nota" wire:model="nota"></x-input>
            </div>
            <div class="grid grid-cols-2 gap-2 my-3">   
                <x-input label="Area Terreno" placeholder="introduzca el area" wire:model="area_terreno"     suffix="Mts2"
                ></x-input>
                <x-input label="Area Construccion" placeholder="introduzca el area" wire:model="area_construccion" suffix="Mts2" ></x-input>
                <x-input label="Area Terreno SD" placeholder="introduzca el area" wire:model="area_terreno_sd" suffix="Mts2"></x-input>
                <x-input label="Area Construccion SD" placeholder="introduzca el area" wire:model="area_construccion_sd" suffix="Mts2"></x-input>
                <x-select  label="Tenencia del terreno" wire:model="tenencia_terreno_id" placeholder="seleccione"
                :options="[
                    ['name' => 'propio', 'id' => 1],
                    ['name' => 'municipal', 'id' => 2],
                    ['name' => 'inavi', 'id' => 3],
                    ['name' => 'gobernacion', 'id' => 4],
                    ['name' => 'intu', 'id' => 5],
                ]" option-label="name" option-value="id"/>
                <x-select  label="Tipo de construccion" wire:model="tipo_construccion_id" placeholder="seleccione"
                :options="[
                    ['name' => 'casa', 'id' => 1],
                    ['name' => 'apartamento', 'id' => 2],
                    ['name' => 'gm vivienda', 'id' => 3],
                    ['name' => 'comercial', 'id' => 4],
                    ['name' => 'comercial Municipal', 'id' => 5]
                ]" option-label="name" option-value="id"/>
            </div>

            <div class="flex-column gap-y-3 mt-5 mb-7 justify-center">
                <x-input label="Lindero Norte" placeholder="Parcela" wire:model="Lindero_norte" ></x-input>
                <x-input label="Lindero Sur" placeholder="Parcela" wire:model="Lindero_sur" ></x-input>
                <x-input label="Lindero Este" placeholder="Parcela" wire:model="Lindero_este" ></x-input>
                <x-input label="Lindero Oeste" placeholder="Parcela" wire:model="Lindero_oeste" ></x-input> 

            </div>

            <div class="grid grid-cols-2 grid-rows-* mb-5 gap-2">
                
                <x-textarea label="Tipo de operacion" wire:model="tipo_documento" ></x-input>
                <x-datetime-picker
                wire:model="fecha_documento"
                label="Fecha del documento"
                placeholder="xx/xx/xxxx"
                display-format="DD/MM/YYYY"
                parse-format="YYYY-MM-DD"
                without-timezone
                without-time	
                :max="now()"
                />                
                <x-input label="Num" placeholder="Num" wire:model="num_documento" ></x-input>
                <x-input label="Folio" placeholder="Folio" wire:model="folio_documento" ></x-input>
                <x-input label="Protocolo" placeholder="Protocolo" wire:model="protocolo_documento" ></x-input>
                <x-input label="Matricula" placeholder="Matricula" wire:model="matricula_documento" ></x-input>
                <x-input label="Trimestre" placeholder="Trimestre" wire:model="trimestre_documento" ></x-input>
                <x-input label="Observaciones" placeholder="observaciones" wire:model="observaciones_documento" ></x-input>
            </div>
{{--             <x-select class="mb-5"
            label="Seleccionar estatus"

            placeholder="Seleccionar"
            :options="['pendiente', 'realizada', 'entregada']"
        /> --}}
            
            <div class="flex justify-end gap-3">
                <x-boton label="Crear" type="submit">Generar</x-boton>
            </div>
        </form>

     

    </x-card>
</div>
