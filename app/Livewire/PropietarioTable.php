<?php

namespace App\Livewire;

use App\Models\Propietario;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Rules\Can;
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
use PowerComponents\LivewirePowerGrid\Facades\Rule; 

final class PropietarioTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'PropietarioTable';

    
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
        return Propietario::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('nombre')
            ->add('tipo_documento')
            ->add('documento')
            ->add('codigo_telefono')
            ->add('telefono')
            ->add('Estatus')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            // Column::make('Id', 'id'),
            Column::make('Nombre', 'nombre')
                ->sortable()
                ->searchable(),

            Column::make('Tipo d.', 'tipo_documento')
                ->sortable()
                ->searchable(),

            Column::make('Documento', 'documento')
                ->sortable()
                ->searchable(),
            column::make('Codigo Telefono', 'codigo_telefono')
                ->sortable()
                ->searchable(),
            Column::make('Telefono', 'telefono')
                ->sortable()
                ->searchable(),

            Column::make('Estatus', 'estado')
                ->sortable()
                ->searchable(),

/*             Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),
 */
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
            Filter::select('estado', 'estado')
            ->dataSource([
                ['id' => 'ACTIVO', 'name' => 'ACTIVO'],
                ['id' => 'INACTIVO', 'name' => 'INACTIVO'],
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

    public function actions(Propietario $row): array
    {
        return [
            Button::add('edit')
                ->slot('editar '/* .$row->id */)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->openModal('edit-propietario', ['id' => $row->id])
         
        ];
    }


    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::rows()
                ->when(fn ($row) => $row->estado == 'INACTIVO')
                ->setAttribute('class', 'bg-red-100 hover:!bg-red-200'),
        ];
    }

}
