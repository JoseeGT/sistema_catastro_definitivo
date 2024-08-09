<div class="w-full flex gap-2 items-end    justify-end" >
    <x-select class="max-w-48"
    wire:model.live="estado"
    label="Estatus"
    placeholder="seleccionar estatus"
    :options="['TODOS   ','ACTIVO', 'INACTIVO']"
/>
    {{-- <x-datetime-picker class=""
    wire:model.live="desde"
    label="desde"
    parse-format="YYYY-MM-DD HH:mm:ss"
    without-time
    display-format="DD/MM/YYYY"
    placeholder="xx/xx/xxxx"
    />  
    <x-datetime-picker class=""
    wire:model="hasta"
    label="hasta"
    parse-format="YYYY-MM-DD HH:mm:ss"
    without-time
    display-format="DD/MM/YYYY"
    placeholder="xx/xx/xxxx"
    />       --}}
    <x-button class="max-h-10 max-w-20" href="{{ route('propietarios.report', ['estado' => $estado]) }}" target="_blank" label="generar reporte"
        info />

</div>
