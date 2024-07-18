<?php

namespace App\Livewire;

use App\Models\Ficha;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Inmueble;
use App\Models\TiposConstruccion;
use Illuminate\Support\Facades\Log;
use App\Models\Documento;
use Carbon\Carbon;
use phpDocumentor\Reflection\Types\This;
use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;

class CreateFicha extends ModalComponent
{   
    public $test;

    public $fecha_ficha;

    public $propietario;
    public $calle1;
    public $calle2;
    public $sector;

    public $inmueble_id;
    public $inmueble;
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

    public $Lindero_norte;
    public $Lindero_sur;
    public $Lindero_este;
    public $Lindero_oeste;

    public $estado='realizada';

    public $tipo_documento;
    public $fecha_documento;
    public $num_documento;
    public $folio_documento;
    public $protocolo_documento;
    public $matricula_documento;
    public $trimestre_documento;
    public $observaciones_documento;
 
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
        'numero_civico' => 'required|max:50',
        'Lindero_norte' => 'max:50|required',
        'Lindero_sur' => 'max:50|required',
        'Lindero_este' => 'max:50|required',
        'Lindero_oeste' => 'max:50|required',
        'fecha_documento' => '',
        // 'estado' => 'required',


        ];



    //   public function mount($id)
    // {
    //     $this->inmueble_id = $id;

    //     $this->loadInmuebleData($id);
    // } 

    public function loadInmuebleData()
    {         
        $inmueble = Inmueble::with([
            'propietario', 
            'codigoCatastral',
            'direccion.calle1',
            'direccion.calle2',
            'direccion.sector',
            'documento',

        ])->findOrFail($this->inmueble_id);

        // dd($inmueble);
        // $this->inmueble_id = $inmueble->id;
        $this->propietario_id = $inmueble->propietario->id;
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
        $this->area_construccion_sd = $inmueble->area_construccion_sd;
        $this->area_terreno = $inmueble->area_terreno;
        $this->area_terreno_sd = $inmueble->area_terreno_sd;
        $this->tenencia_terreno_id = $inmueble->tenencia_terreno_id;
        $this->tipo_documento = $inmueble->documento->tipo_operacion??'';
        $this->fecha_documento = $inmueble->documento->fecha??' ';
        $this->num_documento = $inmueble->documento->num??'';
        $this->folio_documento = $inmueble->documento->folio??'';
        $this->protocolo_documento = $inmueble->documento->protocolo??'';
        $this->matricula_documento = $inmueble->documento->matricula??'';
        $this->trimestre_documento = $inmueble->documento->trimestre??'';
        $this->observaciones_documento = $inmueble->documento->observaciones??''; 
        $this->Lindero_norte = $inmueble->Lindero_norte??'';
        $this->Lindero_sur = $inmueble->Lindero_sur??'';
        $this->Lindero_este = $inmueble->Lindero_este??'';
        $this->Lindero_oeste = $inmueble->Lindero_oeste??'';
        $this->fecha_ficha = Carbon::now()->format('Y-m-d');
        
    }


    public function submit()
    {
        $this->validate();

        Inmueble::updateOrCreate(
            ['id' => $this->inmueble_id],
            [
                'propietario_id' => $this->propietario_id,
               
                'tipo_construccion_id' => $this->tipo_construccion_id,
                'area_construccion' => $this->area_construccion,
                'area_construccion_sd' => $this->area_construccion_sd,
                'area_terreno' => $this->area_terreno,
                'area_terreno_sd' => $this->area_terreno_sd,
                'tenencia_terreno_id' => $this->tenencia_terreno_id,
                'Lindero_norte' => $this->Lindero_norte,
                'Lindero_sur' => $this->Lindero_sur,
                'Lindero_este' => $this->Lindero_este,
                'Lindero_oeste' => $this->Lindero_oeste,
                // Agrega otros campos necesarios
            ]
            
        );      
        
        $this->inmueble = Inmueble::findOrFail($this->inmueble_id);
        


        $this->inmueble->direccion()->updateOrCreate([
            'id' => $this->inmueble_id,
        ],
        [
            'calle1_id' => $this->calle_id,
            'sector_id' => $this->sector_id,
            'numero_civico' => $this->numero_civico,
            'nota' => $this->nota,
        ]
        );
        $this->inmueble->ficha()->Create([
            'inmueble_id' => $this->inmueble_id,
            'fecha' => $this->fecha_ficha,
            'estado' => $this->estado,
        ]);

        $this->inmueble->documento()->updateOrCreate([
            'id' => $this->inmueble_id,
        ],
        [
            'tipo_operacion' => $this->tipo_documento,
            'fecha' => $this->fecha_documento,
            'num' => $this->num_documento,
            'folio' => $this->folio_documento,
            'protocolo' => $this->protocolo_documento,
            'matricula' => $this->matricula_documento,
            'trimestre' => $this->trimestre_documento,
            'observaciones' => $this->observaciones_documento,
        ]
        );
        
        $this->inmueble->codigoCatastral()->updateOrCreate([
            'inmueble_id' => $this->inmueble_id,
        ],
        [ 'sec' => $this->sec,
        'man' => $this->man,
        'par' => $this->par,
        'sbp' => $this->sbp,
        'niv' => $this->niv,
        'uni' => $this->uni,
        ]
        );      
        
        $this->dispatch('pg:eventRefresh-FichaTable');

        $this->closeModal();
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'Generó ficha: '.$this->sec." ".$this->man." ".$this->par." ".$this->sbp." ".$this->niv." ".$this->uni,
            'fecha' => Carbon::now(),
        ]);
    }


    

    public function render()
    {
        return view('livewire.create-ficha');
    }

}