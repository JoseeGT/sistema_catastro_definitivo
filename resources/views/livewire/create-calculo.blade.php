<div>
    <x-card class=" max-w-5xl " shadow="xl" title="Crear inmueble">
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
        <x-boton class="h-10" wire:click="loadInmuebleData('{{ $inmueble_id }}')">Cargar Inmueble</x-boton>

        </div>    
        <form wire:submit.prevent="submit">
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
                label="  calle"
                placeholder="seleccione"
                :async-data="route('api.calles.index')"
                option-label="nombre"
                option-value="id"
                wire:model="calle_id"
            />
            
            </div>
            <div class="flex gap-2 py-2">
                <x-input disabled label="Numero Civico" placeholder="Ingrese el numero" wire:model="numero_civico" ></x-input>
                <x-input disabled label="Nota de la direccion" placeholder="Nota" wire:model="nota"></x-input>
            </div>
            <div class="grid grid-cols-2 gap-2 my-3">   
                <x-input disabled label="Area Terreno" placeholder="introduzca el area" wire:model="area_terreno"     suffix="Mts2"
                ></x-input>
                <x-input disabled label="Area Construccion" placeholder="introduzca el area" wire:model="area_construccion" suffix="Mts2" ></x-input>
                <x-select disabled label="Tenencia del terreno" wire:model="tenencia_terreno_id" placeholder="seleccione"
                :options="[
                    ['name' => 'propio', 'id' => 1],
                    ['name' => 'municipal', 'id' => 2],
                    ['name' => 'inavi', 'id' => 3],
                    ['name' => 'gobernacion', 'id' => 4],
                    ['name' => 'intu', 'id' => 5],
                ]" option-label="name" option-value="id"/>
                <x-select disabled label="Tipo de construccion" wire:model="tipo_construccion_id" placeholder="seleccione"
                :options="[
                    ['name' => 'casa', 'id' => 1],
                    ['name' => 'apartamento', 'id' => 2],
                    ['name' => 'gm vivienda', 'id' => 3],
                    ['name' => 'comercial', 'id' => 4],
                    ['name' => 'comercial Municipal', 'id' => 5]
                ]" option-label="name" option-value="id"/>
            </div>
            <h2 class="my-5">Servicios y/o tasas</h2>
            <div class=" mb-10 grid grid-cols-2 gap-7 border-gray-300 border rounded-lg p-3">
                <x-toggle id="acueducto" name="toggle" label="Acueducto"  sm wire:model.live="acueducto"/>
                <x-toggle id="cloaca" name="toggle" label="Cloaca"  sm wire:model.live="cloaca"/>
                <x-toggle id="ficha" name="toggle" label="Ficha_Catastral"  sm wire:model.live="ficha_catastral"/>
                <x-toggle id="art_91" name="toggle" label="Art. 91"  sm wire:model.live="art_91"/>
                <x-toggle id="solvencia" name="toggle" label="Solvencia"  sm wire:model.live="solvencia"/>
                <x-toggle id="inspeccion" name="toggle" label="Inspeccion"  sm wire:model.live="inspeccion"/>
                <x-toggle id="plano_mensura" name="toggle" label="Plano Mensura"  sm wire:model.live="plano_mensura"/>
            </div>


            <div class="grid grid-cols-3 gap-2 w-full align-items-center">
                <div>
                    <h2>Impuesto de Construcción</h2>
                    <div class="my-[7px] rounded-[4px] border border-[#E7EAEE] p-1 text-[#191D23]">MMV. {{ $impuesto_construccion }}</div>
                </div>
                <div>
                    <h2>Impuesto de Terreno</h2>
                    <div class="my-[7px] rounded-[4px] border border-[#E7EAEE] p-1 text-[#191D23]">MMV. {{ $impuesto_terreno }}</div>
                </div>
                <x-select
                label="Descuento en Prop. Inmobiliaria"
                placeholder="Selecciona un % "
                wire:model="descuento"
                :options="[
                    ['name' => '10%', 'id' => 1],
                    ['name' => '20%', 'id' => 2],
                    ['name' => '30%', 'id' => 3],
                    ['name' => '40%', 'id' => 4],
                    ['name' => '50%', 'id' => 5],
                    ['name' => '60%', 'id' => 6],
                    ['name' => '70%', 'id' => 7],
                    ['name' => '80%', 'id' => 8],
                    ['name' => '90%', 'id' => 9],
                    ['name' => '100%', 'id' => 10],
                ]" option-label="name" option-value="id"
            />
            <div>
                <h2>Total Propiedad Inmobiliaria</h2>
                <div class="bg-slate-200 my-[7px] rounded-[4px] border border-[#E7EAEE] p-1 text-[#191D23]">MMV. {{ $sub_total}} </div>
            </div> 

            </div>
            <div>
                <h2>Tasas</h2>
                <div class="bg-slate-200 my-[7px] rounded-[4px] border border-[#E7EAEE] p-1 text-[#191D23] w-52">MMV. {{ $tasas }} </div>
            </div> 
            <div>
                <h2>Total</h2>
                <div class="bg-slate-200 my-[7px] rounded-[4px] border border-[#E7EAEE] p-1 text-[#191D23]">MMV. {{ $total }} </div>
            </div>



            <div class="flex justify-end gap-3">
                    <x-button negative wire:click="$dispatch('closeModal')" label="Cancelar"/>
                    <x-boton label="Calcular" wire:click="calcular" onclick="event.preventDefault();">Calcular</x-boton>
                    <x-boton label="generar" type="submit">Generar</x-boton>
            </div>
        </form>
        
    </x-card>
</div>
