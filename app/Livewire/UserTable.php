<?php

namespace App\Livewire;

use App\Models\User;
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

final class UserTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'UserTable';

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
        return User::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('tipo_documento')
            ->add('documento')
            ->add('cod_telefono')
            ->add('telefono')
            ->add('estado')
            ->add('fecha_creacion')
            ->add('created_at_formatted', fn ($dish) => Carbon::parse($dish->fecha_creacion)->timezone('America/Caracas')->format('d/m/Y'));

    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Nombre', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Tipo d.', 'tipo_documento')
                ->sortable()
                ->searchable(),

            Column::make('documento', 'documento')
                ->sortable()
                ->searchable(),

            Column::make('Cod.t', 'cod_telefono')
                ->sortable()
                ->searchable(),

            Column::make('Telefono', 'telefono')
                ->sortable()
                ->searchable(),
            Column::make('estado', 'estado'),
            column::make('Creacion', 'created_at_formatted'),

            Column::action('Action')
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
            Filter::datepicker('created_at_formatted', 'fecha_creacion')
                ->params([
                    'timezone' => 'America/Caracas',
                ]),

        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(User $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->openModal('edit-usuario', ['id' => $row->id]),
                    ];
    }

    
    // public function actionRules($row): array
    // {
    //    return [
    //         // Hide button edit for ID 1
    //         Rule::button('edit')
    //             ->when(fn($row) => $row->id === 1)
    //             ->hide(),
    //         Rule::row('estado')
    //         ->when(fn($row) => $row-> === 1)
    //         ->hide(),
    //     ];
    // }
    
}
