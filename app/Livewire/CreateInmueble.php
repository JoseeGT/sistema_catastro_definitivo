<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Livewire\Component;
use App\Models\Inmueble;
use App\Models\TenenciasTerreno;
use App\Models\Propietario;
use App\Models\TiposConstruccion;
use App\Models\InmueblesDocumento;
use App\Models\Calle;
use App\Models\Sectores;
use App\Models\CodigoCatastral;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\WireUiActions;

class CreateInmueble extends ModalComponent
{   
    use WireUiActions;

    public $inmueble;
    public $codigo_catastral;
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
    public $obsevacion;
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
    public $Lindero_norte;
    public $Lindero_sur;
    public $Lindero_este;
    public $Lindero_oeste;
    public $fecha;
    public $estado = 'ACTIVO';

    protected $rules = [
        'sec' => 'required|min:3|max:3',
        'man' => 'sometimes|nullable|min:3|max:3',
        'par' => 'sometimes|nullable|min:3|max:3',
        'sbp' => 'sometimes|nullable|min:3|max:3',
        'niv' => 'sometimes|nullable|min:3|max:3',
        'uni' => 'sometimes|nullable|min:3|max:3',
        'area_terreno' => 'required|numeric',
        'area_construccion' => 'required|numeric',
        'area_terreno_sd' => '',
        'area_construccion_sd' => '',
        'tenencia_terreno_id' => 'required',
        'propietario_id' => 'required',
        'tipo_construccion_id' => 'required',
        'calle_id' => 'required',
        'sector_id' => 'required',
        'nota' => 'max:255',
        'numero_civico' => 'required|max:30',
        'Lindero_norte' => 'max:30',
        'Lindero_sur' => 'max:30',
        'Lindero_este' => 'max:30',
        'Lindero_oeste' => 'max:30',
        'estado' => 'required|in:ACTIVO,INACTIVO',  
    ];

    public function mount()
    {
        /* $this->propietarios = Propietario::all();
        $this->tenencias_terrenos = TenenciasTerreno::all();
        $this->tipos_construccion = TiposConstruccion::all(); */

    }
    public function submit()
    {
        $this->validate();



        $inmueble = Inmueble::create([
            'area_terreno' => $this->area_terreno,
            'area_construccion' => $this->area_construccion,
            'area_terreno_sd' => $this->area_terreno_sd,
            'area_construccion_sd' => $this->area_construccion_sd,
            'propietario_id' => $this->propietario_id,
            'tenencia_terreno_id' => $this->tenencia_terreno_id,
            'tipo_construccion_id' => $this->tipo_construccion_id,
            'tipo_construccion_id' 
        ]);
        $this->man = $this->man ?: '000';
        $this->par = $this->par ?: '000';
        $this->sbp = $this->sbp ?: '000';
        $this->niv = $this->niv ?: '000';
        $this->uni = $this->uni ?: '000';
        $codigoCatastralData = array_filter([
            'sec' => $this->sec,
            'man' => $this->man,
            'par' => $this->par,
            'sbp' => $this->sbp,
            'niv' => $this->niv,
            'uni' => $this->uni,
        ], function ($value) {
            return !is_null($value);
        });
        $inmueble->codigoCatastral()->create($codigoCatastralData);

        $inmueble->direccion()->create([
            'calle1_id' => $this->calle_id,
            'sector_id' => $this->sector_id,
            'nota' => $this->nota,
            'numero_civico' => $this->numero_civico,
        ]);

        Auditoria::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'Registro inmueble: '.$this->sec." ".$this->man." ".$this->par." ".$this->sbp." ".$this->niv." ".$this->uni,
            'fecha' => Carbon::now(),
        ]);

        $this->successDialog();
        session()->flash('message', 'inmueble creado exitosamente.');
        $this->dispatch('pg:eventRefresh-InmuebleTable');
        $this->closeModal();
        $this->reset();
    }
    public function setAttribute($key, $value)
    {
        if (is_string($value) && trim($value) === '') {
            $value = null;
        }

        return parent::setAttribute($key, $value);
    }

    public function successDialog(): void
    {
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'creado!',
            'description' => 'el inmueble ha sido creado con exito.',
        ]);
    }
    public function render()
    {
        return view('livewire.create-inmueble');
    }
}
