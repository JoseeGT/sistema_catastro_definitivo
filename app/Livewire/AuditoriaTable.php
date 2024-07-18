<?php

namespace App\Livewire;

use App\Models\Auditoria;
use App\Models\User;
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

final class AuditoriaTable extends PowerGridComponent
{
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
        return Auditoria::query()
            ->join('users',function($users){
                $users->on('auditoria.user_id', '=', 'users.id');
            })
            ->select('auditoria.*', 'users.name as user_name')
            ->orderBy('auditoria.id', 'desc')
            ;
    }

    public function relationSearch(): array
    {
        return ['user' => 'name',
        ];
    }
    public bool $showFilters = true;


    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('user_name')

            ->add('descripcion')
            ->add('fecha')
            ->add('fecha_formateada', function ($auditoria) {
                return Carbon::parse($auditoria->fecha)->format('d/m/Y H:i:s');
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Usuario', 'user_name'),
            Column::make('Descripcion', 'descripcion')
                ->sortable()
                ->searchable(),



            Column::make('Fecha', 'fecha_formateada')
                ->sortable()
                ->searchable(),

            // Column::action('Action')
        ];
    }
    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }
    public function filters(): array
    {
        return [
            Filter::select('user_name', 'users.id')
                ->dataSource(User::all())
                ->optionLabel('name')
                ->optionValue('id'),
                Filter::datepicker('fecha_formateada', 'auditoria.fecha')    
                ->params([
                    'timezone' => 'America/Caracas',
                ]),
                Filter::inputText('descripcion','descripcion')
                ->operators(['contains']),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    // public function actions(Auditoria $row): array
    // {
    //     return [
    //         Button::add('edit')
    //             ->slot('Edit: '.$row->id)
    //             ->id()
    //             ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
    //             ->dispatch('edit', ['rowId' => $row->id])
    //     ];
    // }

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
