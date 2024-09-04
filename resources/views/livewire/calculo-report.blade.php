    <div class="w-full flex gap-2 items-end    justify-end" >
        {{-- <x-select class="max-w-48"
        wire:model.live="estado"
        label="estado"
        placeholder="seleccionar estado"
        :options="['TODOS   ','ACTIVO', 'INACTIVO']"/> --}}




    <x-datetime-picker class=" max-w-72"
    wire:model.live="desde"

    parse-format="YYYY-MM-DD HH:mm:ss"
    without-time
    display-format="DD/MM/YYYY"
    placeholder="desde" 
    :max="now()"
    />  
    <x-datetime-picker class=" max-w-72"
    wire:model.live="hasta"

    parse-format="YYYY-MM-DD HH:mm:ss"
    without-time
    display-format="DD/MM/YYYY"
    placeholder="hasta"
    :max="now()->addDays(1)->hours(12)->minutes(30)"
    />      
    <x-button class="max-h-10 max-w-28 text-center" href="{{ route('calculos.report', ['desde' => $desde, 'hasta' => $hasta]) }}" target="_blank" label="Generar reporte"
        info />

</div>
