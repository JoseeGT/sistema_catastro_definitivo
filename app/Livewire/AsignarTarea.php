<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Tarea;
use App\Models\User;
use Carbon\Carbon;

class AsignarTarea extends ModalComponent
{   
    public $tarea;
    public $titulo;
    public $descripcion;
    public $estad='Pendiente';
    public $asignado_por;
    public $asignado_a_id;
    public $usuario;
    protected $rules = [
        'asignado_a_id' => 'required',
        'titulo' => 'required',
        'descripcion' => 'required',
    ];

    public function submit()
    {   

        $this->validate();    
        $this->usuario = User::find($this->asignado_a_id);  
        Tarea::create([
            'titulo' => $this->titulo,
            'descripcion' => $this->descripcion,
            'estado' => $this->estad,
            'asignado_por_id' => Auth::id(),
            'asignado_a_id' => $this->asignado_a_id,
            'fecha_asignacion' => Carbon::now(),
            'fecha_completado' => null,


        ]);
        $this->dispatch('pg:eventRefresh-TareasTable');
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'asignó tarea a ' . $this->usuario->name,
            'fecha' => Carbon::now(),
        ]);
        $this->reset();

    }
    public function render()
    {
        return view('livewire.asignar-tarea');
    }
}
