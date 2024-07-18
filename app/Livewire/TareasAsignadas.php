<?php

namespace App\Livewire;

use App\Models\Tarea;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TareasAsignadas extends Component
{
    public $tareas;
    public $titulo;
    public $descripcion;
    public $estado = 'Pendiente';
    public $asignado_por;
    public $asignado_a_id;

    
    public function mount()
    {
        $userId = Auth::id(); // Obtén el ID del usuario autenticado
        $this->tareas = Tarea::where('estado', 'Pendiente') // Añade la condición del estado
                            ->get(); // Busca las tareas asignadas al usuario con estado pendiente
    }
    public function render()
    {
        return view('livewire.tareas-asignadas');
    }
}
