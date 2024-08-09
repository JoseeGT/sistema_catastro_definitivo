<?php

namespace App\Livewire;

use App\Models\Tarea;
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

final class TareasTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'TareasTable';

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
        return Tarea::query()
        ->join('users',function($users){
            $users->on('tareas.asignado_a_id', '=', 'users.id');
        })
        ->select('tareas.*'
        ,'users.name as asignado_a_id')
        
        
        
        
        
        ;

    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('titulo')
            ->add('descripcion')
            ->add('estado')
            ->add('fecha_asignacion_formateada', function ($tarea) {
                return Carbon::parse($tarea->fecha_asignacion)->format('d/m/Y');
            })

            ->add('fecha_completada_formateada', function ($tareas) {
                if( $tareas->fecha_completada){
                    return Carbon::parse($tareas->fecha_completada)->format('d/m/Y');
                }
                else{
                    return "";
                }
            })
            // ->add('fecha_completada')
            ;
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Titulo', 'titulo')
                ->sortable()
                ->searchable(),

            Column::make('Descripcion', 'descripcion')
                ->sortable()
                ->searchable(),
            Column::make('asignada a', 'asignado_a_id')
            ->sortable()
            ->searchable(),
            Column::make('Fecha de la Asignación', 'fecha_asignacion_formateada'),
            Column::make('Fecha Completada', 'fecha_completada_formateada'),

            Column::make('Estado', 'estado')
                ->sortable()
                ->searchable(),


            // Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    // public function actions(Tarea $row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: '.$row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id]),
    //     ];
    // }

    
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::rows()
            ->when(fn ($row) => $row->estado == 'Finalizado')
            ->setAttribute('class', 'bg-green-100 hover:!bg-green-200'),
        ];
    }
    
}
