<?php

namespace App\Livewire;

use App\Models\Inmueble;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class InmuebleTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'InmuebleTable';

    public bool $multiSort = true;

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }
    
    
    public function datasource(): Builder
    {
        return Inmueble::query()
                ->join('tenencias_terrenos',function($tenencias_terreno){
                    $tenencias_terreno->on('inmuebles.tenencia_terreno_id', '=', 'tenencias_terrenos.id');
                })
                ->join('tipos_construccion',function($tipos_construccion){
                    $tipos_construccion->on('inmuebles.tipo_construccion_id', '=', 'tipos_construccion.id');
                })
                ->join('propietarios',function($propietarios){
                    $propietarios->on('inmuebles.propietario_id', '=', 'propietarios.id');
                })
                ->join('codigos_catastrales',function($codigos_catastrales){
                    $codigos_catastrales->on('codigos_catastrales.inmueble_id', '=', 'inmuebles.id');
                })
                ->join('direcciones',function($direcciones){
                    $direcciones->on('direcciones.inmueble_id', '=', 'inmuebles.id');
                })
                ->leftjoin('calles as calle1',function($calle1){
                    $calle1->on('direcciones.calle1_id', '=', 'calle1.id');
                })
                ->leftjoin('calles as calle2',function($calle2){
                    $calle2->on('direcciones.calle2_id', '=', 'calle2.id');
                })
                ->leftjoin('sectores',function($sectores){
                    $sectores->on('sectores.id', '=', 'direcciones.sector_id');
                })
                
                ->select([
                    'inmuebles.id',
                    'inmuebles.area_terreno',
                    'inmuebles.area_construccion',
                    'inmuebles.area_terreno_sd',
                    'inmuebles.area_construccion_sd',
                    'inmuebles.tenencia_terreno_id',
                    'inmuebles.estado',
                    'codigos_catastrales.sec',
                    'codigos_catastrales.man',
                    'codigos_catastrales.par',
                    'codigos_catastrales.sbp',
                    'codigos_catastrales.niv',
                    'codigos_catastrales.uni',
                    'direcciones.calle1_id',
                    'direcciones.calle2_id',
                    'direcciones.sector_id',
                    'direcciones.nota',
                    'numero_civico',
                    'tenencias_terrenos.nombre as tenencia_terreno_nombre',
                    'tipos_construccion.nombre as tipo_construccion_nombre',
                    'propietarios.nombre as propietario_nombre',
                    'calle1.nombre as calle1_nombre',
                    'calle2.nombre as calle2_nombre',
                    'sectores.nombre as sector_nombre',
                ])
                ->orderBy('codigos_catastrales.sec', 'asc')
                ->orderBy('codigos_catastrales.man', 'asc')
                ->orderBy('codigos_catastrales.par', 'asc')
                ->orderBy('codigos_catastrales.sbp', 'asc')
                ->orderBy('codigos_catastrales.niv', 'asc')
                ->orderBy('codigos_catastrales.uni', 'asc')
                ;                 

    }

    public function relationSearch(): array
    {
        return [
            'propietario' => 'nombre',
            'tenenciaterreno' => 'nombre',
            'tipoconstruccion' => 'nombre',
            'direccion.calle1' => 'nombre',
            'direccion.calle2' => 'nombre',
            'direccion.sector' => 'nombre',
            'direccion' => 'numero_civico',
            'codigocatastral' => [
                'sec',
                'man',
                'par',
                'sbp',
                'niv',
                'uni',
            ],

        ];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('inmueble_id')

            ->add('codigos_catastrales', function ($codigo_catastral) {
                return $codigo_catastral->sec . '-' . $codigo_catastral->man . '-' . $codigo_catastral->par . '-' . $codigo_catastral->sbp . '-' . $codigo_catastral->niv . '-' . $codigo_catastral->uni;
            })
            ->add('direcciones', function ($direcciones) {
                return $direcciones->calle1_nombre . ' ' . $direcciones->calle2_nombre .' N° '.$direcciones->numero_civico . '   ' . $direcciones->sector_nombre . ' ';
            })
            ->add('sec')
            ->add('man')
            ->add('par')
            ->add('sbp')
            ->add('niv')
            ->add('uni')
            ->add('calle1_nombre')
            ->add('area_terreno')
            ->add('area_construccion')
            ->add('area_terreno_sd')
            ->add('area_construccion_sd')
            ->add('tenencia_terreno_nombre')
            ->add('tipo_construccion_nombre')
            ->add('propietario_nombre')
            ->add('Lindero_norte')
            ->add('Lindero_sur')
            ->add('Lindero_este')
            ->add('Lindero_oeste')
            ->add('estado')
            ->add('created_at');
    }

    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }
    public function columns(): array
    {
        return [
/*             Column::make('Id', 'id'),

 */
            // Column::make('Catastral', 'codigos_catastrales'),
            column::make('N°', '.')
                ->index(),
            Column::make('Sec', 'sec')
                
                ->searchable(),
            Column::make('Man', 'man')
                ->searchable(),  
            Column::make('Par', 'par')
                ->searchable(),
            Column::make('Sbp', 'sbp')
                ->searchable(),
            Column::make('Niv', 'niv')
                ->searchable(),
                Column::make('Uni', 'uni')
                ->searchable(),   
                Column::make('Propietario', 'propietario_nombre'),

                Column::make('Calle', 'calle1_nombre'), 
            // Column::make('Calle', 'calle2_nombre'),
            Column::make('N° parcela', 'numero_civico'),
            Column::make('Sector', 'sector_nombre'),
            
            // Column::make('direcciones', 'direcciones'),

             Column::make('Area T', 'area_terreno')

                ->searchable(),

            Column::make('Area C.', 'area_construccion')
                ->searchable(),

/*             Column::make('Area terreno sd', 'area_terreno_sd')
                ->sortable()
                ->searchable(),

            Column::make('Area construccion sd', 'area_construccion_sd')
                ->sortable()
                ->searchable(), */

            Column::make('Tenencia terreno', 'tenencia_terreno_nombre')
                ->searchable(),

            Column::make('Tipo construccion', 'tipo_construccion_nombre'),
            /* 
            Column::make('Lindero norte', 'Lindero_norte')
                ->sortable()
                ->searchable(),

            Column::make('Lindero sur', 'Lindero_sur')
                ->sortable()
                ->searchable(),

            Column::make('Lindero este', 'Lindero_este')
                ->sortable()
                ->searchable(),

            Column::make('Lindero oeste', 'Lindero_oeste')
                ->sortable()
                ->searchable(), */

            Column::make('Estado', 'estado')
                ->sortable()
                ->searchable(),

/*             Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(), */

            Column::action('Acciones', 'action')
        ];
    }


    public function filters(): array
    {
        return [
            Filter::select('estado', 'inmuebles.estado')
                ->dataSource([
                    ['id' => 'ACTIVO', 'name' => 'ACTIVO'],
                    ['id' => 'INACTIVO', 'name' => 'INACTIVO'],
                    ['id' => 'UNIFICACION INACTIVA', 'name' => 'UNIFICACION INACTIVA'],
                    ['id' => 'DIVISION INACTIVA', 'name' => 'DIVISION INACTIVA'],

                ])
                ->optionLabel('name')
                ->optionValue('id'),
            Filter::select('sec', 'sec')
            ->dataSource([
                ['id' => '001', 'name' => '001'],
                ['id' => '002', 'name' => '002'],
                ['id' => '003', 'name' => '003'],
                ['id' => '004', 'name' => '004'],
                ['id' => '005', 'name' => '005'],
                ['id' => '006', 'name' => '006'],
                ['id' => '007', 'name' => '007'],
                ['id' => '008', 'name' => '008'],
                ['id' => '009', 'name' => '009'],
                ['id' => '010', 'name' => '010'],
                ['id' => '011', 'name' => '011'],
                ['id' => '012', 'name' => '012'],
                ['id' => '013', 'name' => '013'],
                ['id' => '014', 'name' => '014'],
                ['id' => '015', 'name' => '015'],
                ['id' => '016', 'name' => '016'],
                ['id' => '017', 'name' => '017'],
                ['id' => '018', 'name' => '018'],
                ['id' => '019', 'name' => '019'],
                ['id' => '020', 'name' => '020'],
                ['id' => '021', 'name' => '021'],
                ['id' => '022', 'name' => '022'],
                ['id' => '023', 'name' => '023'],
                ['id' => '024', 'name' => '024'],
                ['id' => '025', 'name' => '025'],
                ['id' => '026', 'name' => '026'],
                ['id' => '027', 'name' => '027'],
                ['id' => '028', 'name' => '028'],
                ['id' => '029', 'name' => '029'],
                ['id' => '030', 'name' => '030'],
                ['id' => '031', 'name' => '031'],
                ['id' => '032', 'name' => '032'],
                ['id' => '033', 'name' => '033'],
                ['id' => '034', 'name' => '034'],
                ['id' => '035', 'name' => '035'],
                ['id' => '036', 'name' => '036'],
                ['id' => '037', 'name' => '037'],
                ['id' => '038', 'name' => '038'],
                ['id' => '039', 'name' => '039'],
                ['id' => '040', 'name' => '040'],
                ['id' => '041', 'name' => '041'],
                ['id' => '042', 'name' => '042'],
                ['id' => '043', 'name' => '043'],
                ['id' => '044', 'name' => '044'],
                ['id' => '045', 'name' => '045'],
                ['id' => '046', 'name' => '046'],
                ['id' => '047', 'name' => '047'],
                ['id' => '048', 'name' => '048'],             
            ])
            ->optionLabel('name')
            ->optionValue('id'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Inmueble $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->openModal('edit-inmueble', ['id' => $row->id]),
            Button::add('Inspeccion')
                ->slot('Inspeccion')
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->openModal('generar-inspeccion', ['id' => $row->id]),

            
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
