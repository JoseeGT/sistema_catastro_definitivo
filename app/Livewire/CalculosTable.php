<?php

namespace App\Livewire;

use App\Models\Calculo;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use LaravelLang\Publisher\Console\Add;
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

final class CalculosTable extends PowerGridComponent
{
    use WithExport;
    public string $tableName = 'CalculoTable';

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
        return Calculo::query()
            ->join('inmuebles',function($inmuebles){
                $inmuebles->on('calculos.inmueble_id', '=', 'inmuebles.id');
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
                "calculos.sub_total as sub_total",
                'calculos.*',
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
                "calculos.created_at as fecha"
            ])
            ->orderBy('id','desc')
            ;
        }
        
    public function relationSearch(): array
    {
        return [
            
            'inmueble.propietario' => 'nombre',
            'inmueble.codigocatastral' => [
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
            ->add('sec')
            ->add('man')
            ->add('par')
            ->add('sbp')
            ->add('niv')
            ->add('uni')
            ->add('calle1_id')
            ->add('inmueble_id')
            ->add('propietario_nombre')
            ->add('impuesto_terreno')
            ->add('impuesto_construccion')
            ->add('total')
            
            ->add('descuento')
            ->add('sub_total')
            ->add('acueducto')
            ->add('acueducto', function ($var) {
                return $var->acueducto ? 'Si' : 'No'; // Yes/No
            })
            ->add('cloaca', function ($var) {
                return $var->cloaca ? 'Si' : 'No'; // Yes/No
            })
            ->add('ficha_catastral', function ($var) {
                return $var->ficha_catastral ? 'Si' : 'No'; // Yes/No
            })
            ->add('art_91', function ($var) {
                return $var->art_91 ? 'Si' : 'No'; // Yes/No
            })
            ->add('solvencia', function ($var) {
                return $var->solvencia ? 'Si' : 'No'; // Yes/No
            })
            ->add('inspeccion')
            ->add('area_terreno')
            ->add('area_construccion')

            ->add('plano_mensura', function ($var) {
                return $var->plano_mensura ? 'Si' : 'No'; // Yes/No
            })

            ->add('fecha') 
            ->add('created_at_formatted', function ($calculo) {
                return Carbon::parse($calculo->created_at)->format('d/m/Y'); //20/01/2024 10:05
            });
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->searchable(),
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

            Column::make('Imp. Terreno', 'impuesto_terreno'),
            Column::make('Imp. Construccion', 'impuesto_construccion'),
            Column::make('Descuento (%)', 'descuento'),
            Column::make('Sub. Total', 'sub_total'),
            // Column::make('Acueducto', 'acueducto'),
            // Column::make('Cloaca', 'cloaca'),
            
            // Column::make('Ficha Catastral', 'ficha_catastral'),
            // Column::make('Art. 91', 'art_91'),
            // Column::make('Solvencia', 'solvencia'),
            // Column::make('Inspeccion', 'inspeccion'),
            // Column::make('Plano Mensura', 'plano_mensura'),


            Column::make('Total', 'total'),
            // Column::make('Calle', 'calle2_nombre'),
            Column::make('Fecha', 'created_at_formatted'),
            Column::action('Acciones'),
        ];
    }

    public function boot(): void
    {
        config(['livewire-powergrid.filter' => 'outside']);
    }
    public function filters(): array
    {
        return [
            Filter::datepicker('created_at_formatted', 'calculos.created_at')    
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

    public function imprimir($rowId): void
    {
     
    }

    public function actions(Calculo $row): array
    {
        return [
            Button::add('imprimir')
                ->slot('Imprimir')
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('invoice',  [
                    'data' => json_encode([
                        'inmueble_id' => $row->inmueble_id,
                        'propietario_nombre' => $row->propietario_nombre,
                        'propietario_td' => $row->propietario_td,
                        'propietario_d' => $row->propietario_d,
                        'sec' => $row->sec,
                        'man' => $row->man,
                        'par' => $row->par,
                        'sbp' => $row->sbp,
                        'niv' => $row->niv,
                        'uni' => $row->uni,
                        'calle1_nombre' => $row->calle1_nombre,
                        'calle2_id' => $row->calle2_id,
                        'sector_nombre' => $row->sector_nombre,
                        'nota' => $row->nota,
                        'numero_civico' => $row->numero_civico,
                        'impuesto_terreno' => $row->impuesto_terreno,
                        'impuesto_construccion' => $row->impuesto_construccion,
                        'total' => $row->total,
                        'acueducto' => $row->acueducto ,
                        'cloaca' => $row->cloaca ,
                        'ficha_catastral' => $row->ficha_catastral ,
                        'art_91' => $row->art_91 ,
                        'solvencia' => $row->solvencia ,
                        'inspeccion' => $row->inspeccion ,
                        'sub_total' => $row->sub_total,
                        'plano_mensura' => $row->plano_mensura,
                        "fecha" => $row-> fecha,
                        "id" => $row-> id,
                        "descuento" => $row-> descuento,

                    ]),
                ] )
                ->target('_blank'),
                // Button::add('Inspeccion')
                // ->slot('Inspeccion')
                // ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                // ->openModal('generar-inspeccion', ['id' => $row->id]),
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
