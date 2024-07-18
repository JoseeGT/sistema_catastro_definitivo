<div>

    <x-card class=" max-w-xl class" shadow="xl" title="Asignar tarea">
        <form wire:submit="submit">
            
            <div class="my-2 flex gap-3">
                <div class=" basis-4/12 my-2">
                    <x-input type="text" label="Titulo*" placeholder="titulo" wire:model.alive="titulo"/>

                </div>
                
                <div class="basis-8/12 my-2">
                    <x-input type="text" label="Descripción*" placeholder="descripcion" wire:model.alive="descripcion"/>
                </div>

            </div>
            <x-select class="my-2"
            label="buscar usuario"
            placeholder="seleccione"
            :async-data="route('api.usuarios.index')"
            option-label="name"
            option-description="descripcion"
            option-value="id"
            wire:model="asignado_a_id"
        />          


            <div class="flex justify-between gap-5">
                {{-- <x-button negative wire:click="$dispatch('closeModal')" label="Cancelar"/> --}}
                <x-button label="Crear tarea" type="submit"/>
            </div>

        </form>
        
        
    </x-card>
</div>
