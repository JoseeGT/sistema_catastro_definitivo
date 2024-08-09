<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Inspeccion;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class GenerarInspeccion extends ModalComponent
{   

    public $inmueble_id;
    public $fecha_inspeccion;
    public $nota;
    public $estado = 'pendiente';
    public $inspector_id = 1;

    protected $rules = [
        'nota' => 'max:255',
        'inspector_id' => 'required',
    ];
    public function mount($id)
    {
        $this->inmueble_id = $id;
    }
    public function GenerarInspeccion(){
        Inspeccion::create([
            'inmueble_id' => $this->inmueble_id,
            'fecha' => $this->fecha_inspeccion,
            'nota' => $this->nota,
            'estado' => $this->estado,
            'inspector_id' => $this->inspector_id
        ]);
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'accion' => 'GENERAR',
            'descripcion' => 'Generó inspección inmueble ',
            'fecha' => Carbon::now(),
        ]);
        $this->closeModal();
        $this->dispatch('pg:eventRefresh-inspeccionTable');
    }
    public function render()
    {   
        return view('livewire.generar-inspeccion');
    }
    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
