<div class="pt-10 flex gap-10 items-center justify-center">
    <button class=" w-full max-w-xs h-52 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex flex-col justify-center items-center gap-3" wire:click="backupDatabase">
        <x-icon name="arrow-down-on-square" class="w-28 h-28" />
        Exportar Base de datos</button>
    <button class=" w-full max-w-xs h-52 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex flex-col justify-center items-center gap-3" label="Restaurar" x-on:click="$openModal('cardModal')" primary>
        <x-icon name="arrow-up-on-square" class="w-28 h-28" />

        Restaurar Base de datos</button>



<x-modal-card title="Restaurar base de datos" id="restore-database-modal" name="cardModal">
    <form wire:submit.prevent="restoreDatabase">
        <div class="grid grid-cols-1 gap-4">

       
            {{-- <livewire:dropzone
            wire:model.live="backupFile"
            :rules="['','mimes:sql','']"
            :multiple="false"/> --}}
            
            <x-input wire:model.live="backupFile" type="file" label="Importar" accept=".sql"></x-input>
            <div class="flex justify-end gap-5">
                <x-button flat negative label="Cancelar" x-on:click="close" />

                <x-button primary label="Restaurar" wire:click="restoreDatabase" x-on:click="$closeModal('cardModal')"/>
            </div>

    </form>
        

    </div>
 
    


</x-modal-card>

    {{-- <form class="flex flex-col gap-2 w-full max-w-xs h-52 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" wire:submit.prevent="restoreDatabase">
        <input type="file" wire:model="backupFile">
        <button type="submit">Restore Database</button>
    </form> --}}
</div>
