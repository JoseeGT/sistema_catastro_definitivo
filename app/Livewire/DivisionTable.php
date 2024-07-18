<?php

namespace App\Livewire;

use App\Models\Division;
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

final class DivisionTable extends PowerGridComponent
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
        return Division::query()
        ->join('inmuebles as lote_original', 'divisiones.lote_original_id', '=', 'lote_original.id')
        ->join('inmuebles as lote_dividido', 'divisiones.lote_dividido_id', '=', 'lote_dividido.id')
        ->join('codigos_catastrales as codigo_original', 'codigo_original.inmueble_id', '=', 'lote_original.id')
        ->join('codigos_catastrales as codigo_dividido', 'codigo_dividido.inmueble_id', '=', 'lote_dividido.id')
        ->select('divisiones.*',
            'lote_original.id as inmueble_original_id',
            'codigo_original.sec as original_sec',
            'codigo_original.man as original_man',
            'codigo_original.par as original_par',
            'codigo_original.sbp as original_sbp',
            'codigo_original.niv as original_niv',
            'codigo_original.uni as original_uni',
            'lote_dividido.id as inmueble_dividido_id',
            'codigo_dividido.sec as dividido_sec',
            'codigo_dividido.man as dividido_man',
            'codigo_dividido.par as dividido_par',
            'codigo_dividido.sbp as dividido_sbp',
            'codigo_dividido.niv as dividido_niv',
            'codigo_dividido.uni as dividido_uni'
        )->orderBy('divisiones.id', 'asc');

    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields();
    }

    public function columns(): array
    {
        return [
            Column::make('Inmueble original', 'inmueble_original_id'),
            Column::make('Inmueble dividido', 'inmueble_dividido_id'),
            
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

    // public function actions(Division $row): array
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
