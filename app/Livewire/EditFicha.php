<?php

namespace App\Livewire;

use App\Models\Auditoria;
use App\Models\Ficha;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Inmueble;
use App\Models\TiposConstruccion;
use Illuminate\Support\Facades\Log;
use App\Models\Documento;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\This;

class EditFicha extends ModalComponent
{   
    public $test;

    public $propietario;
    public $calle1;
    public $calle2;
    public $sector;

    public $ficha_id;

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

    public $estado_ficha;
    public $fecha_ficha ;

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



    public function mount($id)
    {   
        $this->ficha_id = $id;
        $this->ficha_id;
        $this->loadInmuebleData($id);
    }

    public function loadInmuebleData($id)
    {   

        $ficha = Ficha::with([
            'inmueble',

        ])->findOrFail($id);
        $this->inmueble_id = $ficha->inmueble->id;
        $this->propietario_id = $ficha->inmueble->propietario->id;
        $this->calle_id = $ficha->inmueble->direccion->calle1->id;
        $this->sector_id= $ficha->inmueble->direccion->sector->id;
        $this->numero_civico = $ficha->inmueble->direccion->numero_civico;
        $this->nota = $ficha->inmueble->direccion->nota;
        $this->sec = $ficha->inmueble->codigoCatastral->sec;
        $this->man = $ficha->inmueble->codigoCatastral->man;
        $this->par = $ficha->inmueble->codigoCatastral->par;
        $this->sbp = $ficha->inmueble->codigoCatastral->sbp;
        $this->niv = $ficha->inmueble->codigoCatastral->niv;
        $this->uni = $ficha->inmueble->codigoCatastral->uni;
        $this->tipo_construccion_id = $ficha->inmueble->tipo_construccion_id;
        $this->area_construccion = $ficha->inmueble->area_construccion;
        $this->area_construccion_sd = $ficha->inmueble->area_construccion_sd;
        $this->area_terreno = $ficha->inmueble->area_terreno;
        $this->area_terreno_sd = $ficha->inmueble->area_terreno_sd;
        $this->tenencia_terreno_id = $ficha->inmueble->tenencia_terreno_id;
        $this->tipo_documento = $ficha->inmueble->documento->tipo_operacion??'';
        $this->fecha_documento = $ficha->inmueble->documento->fecha??null;
        $this->num_documento = $ficha->inmueble->documento->num??'';
        $this->folio_documento = $ficha->inmueble->documento->folio??'';
        $this->protocolo_documento = $ficha->inmueble->documento->protocolo??'';
        $this->matricula_documento = $ficha->inmueble->documento->matricula??'';
        $this->trimestre_documento = $ficha->inmueble->documento->trimestre??'';
        $this->observaciones_documento = $ficha->inmueble->documento->observaciones??''; 
        $this->Lindero_norte = $ficha->inmueble->Lindero_norte??'';
        $this->Lindero_sur = $ficha->inmueble->Lindero_sur??'';
        $this->Lindero_este = $ficha->inmueble->Lindero_este??'';
        $this->Lindero_oeste = $ficha->inmueble->Lindero_oeste??'';
        $this->estado_ficha = $ficha->estado;
        ;
    }


    public function submit()
    {
        $this->validate();
        $this->fecha_ficha = Carbon::now();
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
        
        $this->inmueble->ficha()->updateOrCreate([
            'id' => $this->ficha_id,
        ],
        [   
            'fecha' => $this->fecha_ficha,
            'estado' => $this->estado_ficha,
        ]
        );
        
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
        [ 
            'sec' => $this->sec,
            'man' => $this->man,
            'par' => $this->par,
            'sbp' => $this->sbp,
            'niv' => $this->niv,
            'uni' => $this->uni,
        ]
        );      
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'Editó ficha ' .$this->sec." ".$this->man." ".$this->par." ".$this->sbp." ".$this->niv." ".$this->uni,
            'fecha' => Carbon::now(),
        ]);
        $this->dispatch('pg:eventRefresh-FichaTable');
        $this->closeModal();
    }

    
    

    public function render()
    {
        return view('livewire.edit-ficha');
    }

}