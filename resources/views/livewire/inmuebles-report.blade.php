    <div class="w-full flex gap-2 items-end    justify-end" >
        <x-select class="max-w-48"
        wire:model.live="estado"
        label="estado"
        placeholder="seleccionar estado"
        :options="['TODOS   ','ACTIVO', 'INACTIVO']"/>
    <x-select class="max-w-48"
    wire:model.live="sec"
label="Codigo sec"
    placeholder="seleccionar estado"
    :options="['TODOS','001','002', '003',
    '004', '005', '006', '007', '008', '009', '010', '011', '012', '013', '014', '015', '016', '017', '018', '019', '020','021', '022', '023', '024', '025', '026', '027', '028', '029', '030', '031', '032', '033', '034', '035', '036', '037', '038', '039', '040','041', '042', '043', '044', '045', '046', '047'
]"/>
{{-- />
<x-select class="max-w-48"
label="buscar sectores"
placeholder="seleccione"
:async-data="route('api.sectores.index')"
option-label="nombre"
option-value="id"
wire:model="sector_id"
/> --}}

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
    <x-button class="max-h-10 max-w-20" href="{{ route('inmuebles.report', ['estado' => $estado, 'sec' => $sec]) }}" target="_blank" label="generar reporte"
        teal />

</div>
