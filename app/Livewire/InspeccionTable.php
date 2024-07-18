<?php

namespace App\Livewire;

use App\Models\Inspeccion;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class InspeccionTable extends PowerGridComponent
{
    public string $tableName = 'InspeccionTable';

    use WithExport;

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
        return Inspeccion::query()
        ->join('inmuebles',function($inmuebles){
            $inmuebles->on('inspecciones.inmueble_id', '=', 'inmuebles.id');
        })
        ->join('propietarios',function($propietarios){
            $propietarios->on('inmuebles.propietario_id', '=', 'propietarios.id');
        })
        ->join('direcciones',function($direcciones){
            $direcciones->on('direcciones.inmueble_id', '=', 'inmuebles.id');
        })
        ->leftjoin('codigos_catastrales',function($codigo_catastral){
          $codigo_catastral->on('codigos_catastrales.inmueble_id', '=', 'inmuebles.id');
        })
        ->leftjoin('calles as calle1',function($calle1){
            $calle1->on('direcciones.calle1_id', '=', 'calle1.id');
        })
        ->leftjoin('calles as calle2',function($calle2){
            $calle2->on('direcciones.calle2_id', '=', 'calle2.id');
        })
        ->leftjoin('sectores',function($sectores){
            $sectores->on('direcciones.sector_id', '=', 'sectores.id');
        })
        
        ->select([
            'inmuebles.id as inmueble_id',
            'propietarios.nombre as propietario_nombre',
            
            'propietarios.tipo_documento as propietario_td',
            'propietarios.documento as propietario_d',
            'codigos_catastrales.sec',
            'codigos_catastrales.man',
            'codigos_catastrales.par',
            'codigos_catastrales.sbp',
            'codigos_catastrales.niv',
            'codigos_catastrales.uni',
            'calle1.nombre as calle1_nombre',
            'direcciones.calle2_id',
            'sectores.nombre as sector_nombre',
            'direcciones.nota',
            'numero_civico',
            'inspecciones.*',
            
        ])
        ->orderBy('inspecciones.id','desc')
        ;    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('inmueble_id')
            ->add('estado_ficha')

            ->add('id')
            ->add('sec')
            ->add('man')
            ->add('par')
            ->add('sbp')
            ->add('niv')
            ->add('uni')
            ->add('calle1_id')
            ->add('inmueble_id')
            ->add('propietario_nombre')
            ->add('created_at')
            ->add('fecha_formateada', fn ($dish) => Carbon::parse($dish->fecha)->timezone('America/Caracas')->format('h:i A d/m/Y'));
            ;
    }

    public function columns(): array
    {
        return [
            Column::make('N°', 'id'),
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
            Column::make('Propietario Nombre', 'propietario_nombre'),
            Column::make('Calle', 'calle1_nombre'), 
            Column::make('N°', 'numero_civico'),
            Column::make('Sector', 'sector_nombre'),
            column::make('fecha asignada', 'fecha_formateada', 'fecha'),
            column::make('nota', 'nota'),
            Column::make('estado', 'estado')
                ->sortable()
                ->searchable(),





            Column::action('Acciones')
        ];
    }

    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }
    public function filters(): array
    {
        return [
            Filter::datepicker('fecha', 'fecha')    
            ->params([
                'timezone' => 'America/Caracas',
            ]),
            Filter::select('estado', 'inspecciones.estado')
            ->dataSource([
                ['id' => 'pendiente', 'name' => 'pendiente'],
                ['id' => 'realizada', 'name' => 'realizada'],
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

    public function actions(Inspeccion $row): array
    {
        return [
            Button::add('edit')
                ->slot('Finalizar')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->openModal('realizar-inspeccion', ['id' => $row->id]),];
    }

    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::rows()
                ->when(fn ($row) => $row->id == 1)
                ->setAttribute('class', 'bg-green-200'),
            Rule::button('edit')
                ->when(fn($row) => $row->estado == 'realizada')
                ->hide(),
        ];
    }
}
