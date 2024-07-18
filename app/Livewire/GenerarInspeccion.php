<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use App\Models\Inspeccion;
use GuzzleHttp\Promise\Create;
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
