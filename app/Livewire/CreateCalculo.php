<?php

namespace App\Livewire;

use App\Models\Auditoria;
use App\Models\Calculo;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Inmueble;
use App\Models\TiposConstruccion;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use WireUi\Traits\WireUiActions;

use Illuminate\Support\Facades\Auth;

class CreateCalculo extends ModalComponent
{
    use WireUiActions;
    public $test;

    public $propietario;
    public $calle1;
    public $calle2;
    public $sector;

    public $inmueble_id;
    
    public $codigo_catastral_id;
    public $sec;
    public $man;
    public $par;
    public $sbp;
    public $niv;
    public $uni;
    public $propietarios;
    public $propietario_id;
    public $calle_id;
    public $sector_id;
    public $numero_civico;
    public $nota;
    public $area_terreno;
    public $area_construccion;
    public $area_terreno_sd;
    public $area_construccion_sd;
    public $tenencia_terreno_id;    
    public $tenencias_terrenos;
    public $tipo_construccion_id;
    public $tipos_construccion;
    public $impuesto_construccion;
    public $impuesto_terreno;
    
    public $descuento;
    public $acueducto;
    public $cloaca;
    public $ficha_catastral;
    public $art_91;
    public $solvencia;
    public $inspeccion;
    public $plano_mensura;
    public $sub_total;
    public $total;
    public $tasas;

    protected $rules = [
        'inmueble_id' => 'required',
    ];

    public function loadInmuebleData()
    {   
        if (!$this->inmueble_id) {
            $this->errorCarga();
            return;
        }

            $inmueble = Inmueble::with([
                'propietario', 
                'codigoCatastral',
                'direccion.calle1',
                'direccion.calle2',
                'direccion.sector',
            ])->findOrFail($this->inmueble_id);
        

         
        $this->propietario = $inmueble->propietario->nombre;
        $this->calle_id = $inmueble->direccion->calle1->id;
        $this->sector_id= $inmueble->direccion->sector->id;
        $this->numero_civico = $inmueble->direccion->numero_civico;
        $this->nota = $inmueble->direccion->nota;
        $this->sec = $inmueble->codigoCatastral->sec;
        $this->man = $inmueble->codigoCatastral->man;
        $this->par = $inmueble->codigoCatastral->par;
        $this->sbp = $inmueble->codigoCatastral->sbp;
        $this->niv = $inmueble->codigoCatastral->niv;
        $this->uni = $inmueble->codigoCatastral->uni;
        $this->tipo_construccion_id = $inmueble->tipo_construccion_id;
        $this->area_construccion = $inmueble->area_construccion;
        $this->area_terreno = $inmueble->area_terreno;
        $this->tenencia_terreno_id = $inmueble->tenencia_terreno_id;
    }

    public function submit()
    {
        if (!$this->total) {
            $this->errorGuardar();
            return;
        }
        $calculo = Calculo::create([
            'inmueble_id' => $this->inmueble_id,
            'impuesto_construccion' => $this->impuesto_construccion,
            'impuesto_terreno' => $this->impuesto_terreno,
            'descuento' => $this->descuento,
            'acueducto' => $this->acueducto ? 1 : 0,
            'cloaca' => $this->cloaca ? 1 : 0,
            'ficha_catastral' => $this->ficha_catastral ? 1 : 0,
            'art_91' => $this->art_91 ? 1 : 0,
            'solvencia' => $this->solvencia ? 1 : 0,
            'inspeccion' => $this->inspeccion ? $this->area_terreno*0.1 : 0,
            'plano_mensura' => $this->plano_mensura ? 1 : 0,
            'sub_total' => $this->sub_total,
            'total' => $this->total,
            'descuento' => $this->descuento*10
        ]);

        $this->dispatch('pg:eventRefresh-CalculoTable');

        $this->closeModal();
        Auditoria::create([
            'user_id' => Auth::user()->id,
'accion' => 'GENERAR',
            'descripcion' => 'Generó calculo para el inmueble: '.$this->sec." ".$this->man." ".$this->par." ".$this->sbp." ".$this->niv." ".$this->uni,
            'fecha' => Carbon::now(),
        ]);

        $this->reset();
    }

    public function calcular()
    {   
        if (!$this->inmueble_id) {
            $this->errorCalculo();
            return;
        }
        $this->sub_total = 0;
        $this->total = 0;
        $this->tasas = 0;

        // Obtener el tipo de construcción
        $tipoConstruccion = TiposConstruccion::findOrFail($this->tipo_construccion_id);

        // Calcular el impuesto de construcción
        $this->impuesto_construccion = round($this->area_construccion * $tipoConstruccion->tasa1 * $tipoConstruccion->tasa2 * 60);

        // Calcular el impuesto de terreno
        if ($this->tenencia_terreno_id !== null && $this->tenencia_terreno_id == 1) {
            $this->impuesto_terreno = round($this->area_terreno * $tipoConstruccion->tasa1 * 0.12 * 60, 2);
        } else {
            $this->impuesto_terreno = 0;
        }

        $this->sub_total= $this->impuesto_terreno + $this->impuesto_construccion;
        $this->sub_total= $this->sub_total - ($this->sub_total * $this->descuento / 10);

        // Sumar tasas adicionales según los valores booleanos
        $this->tasas += $this->acueducto ? 10.8 : 0;
        $this->tasas += $this->cloaca ? 5.4 : 0;
        $this->tasas += $this->ficha_catastral ? 15.00 : 0;
        $this->tasas += $this->solvencia ? 15 : 0;
        $this->tasas += $this->art_91 ? 1.32 : 0;
        $this->tasas += $this->inspeccion ? 0.1 * $this->area_terreno : 0;
        $this->tasas += $this->plano_mensura ? 15.00 : 0;

        // Calcular el total
        $this->total = round($this->sub_total + $this->tasas, 2);
    }

    public function errorCarga(): void
    {
        $this->dialog()->show([
            'icon' => 'error',
            'title' => 'Error!',
            'description' => 'Primero debe seleccionar un inmueble.',
        ]);
    }
    public function errorCalculo(): void
    {
        $this->dialog()->show([
            'icon' => 'error',
            'title' => 'Error!',
            'description' => 'Primero debe cargar un inmueble.',
        ]);
    }
    public function errorGuardar(): void
    {
        $this->dialog()->show([
            'icon' => 'error',
            'title' => 'Error!',
            'description' => 'Primero debe Calcular un el impuesto.',
        ]);
    }
    public function render()
    {
        return view('livewire.create-calculo');
    }
}
