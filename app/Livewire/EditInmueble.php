<?php

namespace App\Livewire;

use App\Models\Auditoria;
use App\Models\CodigoCatastral;
use App\Models\Inmueble;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use phpDocumentor\Reflection\Types\This;

class EditInmueble extends ModalComponent
{   
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
    public $estado;
    public $plano_path;
    

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
    public static function modalWidth(): string
    {
        return '7xl';
    }
    public function mount($id){
        $this->inmueble = Inmueble::findorfail($id);
        $this->sec = $this->inmueble->codigoCatastral->sec;
        $this->man = $this->inmueble->codigoCatastral->man;
        $this->par = $this->inmueble->codigoCatastral->par;
        $this->sbp = $this->inmueble->codigoCatastral->sbp;
        $this->niv = $this->inmueble->codigoCatastral->niv;
        $this->uni = $this->inmueble->codigoCatastral->uni;
        $this->propietario_id = $this->inmueble->propietario_id;
        $this->calle_id = $this->inmueble->direccion->calle1_id;
        $this->sector_id = $this->inmueble->direccion->sector_id;
        $this->numero_civico = $this->inmueble->direccion->numero_civico;
        $this->nota = $this->inmueble->direccion->nota;
        $this->area_terreno = $this->inmueble->area_terreno;
        $this->area_construccion = $this->inmueble->area_construccion;
        $this->area_terreno_sd = $this->inmueble->area_terreno_sd;
        $this->area_construccion_sd = $this->inmueble->area_construccion_sd;
        $this->Lindero_norte = $this->inmueble->Lindero_norte;
        $this->Lindero_sur = $this->inmueble->Lindero_sur;
        $this->Lindero_este = $this->inmueble->Lindero_este;
        $this->Lindero_oeste = $this->inmueble->Lindero_oeste;
        $this->fecha = $this->inmueble->fecha;
        $this->estado = $this->inmueble->estado;
        $this->tipo_construccion_id = $this->inmueble->tipo_construccion_id;
        $this->tenencia_terreno_id = $this->inmueble->tenencia_terreno_id;
        $this->plano_path = $this->inmueble->plano_path;
    }
    public function submit(){
        $this->validate();
        $this->inmueble->update([
            'propietario_id' => $this->propietario_id,
            'area_terreno' => $this->area_terreno,
            'area_construccion' => $this->area_construccion,
            'area_terreno_sd' => $this->area_terreno_sd,
            'area_construccion_sd' => $this->area_construccion_sd,
            'Lindero_norte' => $this->Lindero_norte,
            'Lindero_sur' => $this->Lindero_sur,
            'Lindero_este' => $this->Lindero_este,
            'Lindero_oeste' => $this->Lindero_oeste,
            'fecha' => $this->fecha,
            'estado' => $this->estado,
            'tenencia_terreno_id' => $this->tenencia_terreno_id,
            'tipo_construccion_id' => $this->tipo_construccion_id,
        ]);

        $this->inmueble->codigoCatastral->update([
            'sec' => is_null($this->sec) ? "000" : $this->sec,
            'man' => is_null($this->man) ? "000" : $this->man,
            'par' => is_null($this->par) ?  "000" : $this->par,
            'sbp' => is_null($this->sbp) ? "000" : $this->sbp,
            'niv' => is_null($this->niv) ? "000" : $this->niv,
            'uni' => is_null($this->uni) ? "000" : $this->uni,
        ]);

        $this->inmueble->direccion->update([
            'calle1_id' => $this->calle_id,
            'sector_id' => $this->sector_id,
            'numero_civico' => $this->numero_civico,
            'nota' => $this->nota,
        ]);
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'accion' => 'EDITAR',
            'descripcion' => 'Editó inmueble: '.$this->sec." ".$this->man." ".$this->par." ".$this->sbp." ".$this->niv." ".$this->uni,
            'fecha' => Carbon::now(),
        ]);
        $this->closeModal();
        $this->dispatch('pg:eventRefresh-InmuebleTable');
        $this->dispatch('pg:eventRefresh-DivisionesTable');


    }
    public function render()
    {
        
        return view('livewire.edit-inmueble');
    }
    public function setCodigoCatastralAttribute($value)
    {
        $this->attributes['sec'] = $value ?? '000';
        $this->attributes['man'] = $value ?? '000';
        $this->attributes['par'] = $value ?? '000';
        $this->attributes['sbp'] = $value ?? '000';
        $this->attributes['niv'] = $value ?? '000';
        $this->attributes['uni'] = $value ?? '000';
    }
}
