<?php
namespace App\Livewire;

use App\Models\Auditoria;
use App\Models\Tarea;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class VerTareas extends Component
{
    public $tareas;
    public $titulo;
    public $descripcion;
    public $estado = 'Pendiente';
    public $asignado_por;
    public $asignado_a_id;


    public $tareas_asignadas;
    public $titulo_asignadas;
    public $descripcion_asignadas;
    public $estado_asignadas = 'Pendiente';
    public $asignado_por_asignadas;
    public $asignado_a_id_asignadas;

    public function mount()
    {
        $userId = Auth::id(); // Obtén el ID del usuario autenticado
        $this->tareas = Tarea::where('asignado_a_id', $userId)
                            ->where('estado', 'Pendiente') // Añade la condición del estado
                            ->get(); // Busca las tareas asignadas al usuario con estado pendiente

        $this->tareas_asignadas = Tarea::where('estado', 'Pendiente') // Añade la condición del estado
                            ->get(); // Busca las tareas asignadas al usuario con estado pendiente
    }

    public function completarTarea($tareaId)
    {
        $tarea = Tarea::find($tareaId);
        if ($tarea && $tarea->asignado_a_id == Auth::id()) {
            $tarea->estado = 'Finalizado';
            $tarea->fecha_completada = Carbon::now();
            $tarea->save();
            $this->mount(); // Vuelve a cargar las tareas
        }
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'accion' => 'COMPLETAR',
            'descripcion' => 'Completó Tarea: '.$tarea->titulo,
            'fecha' => Carbon::now(),
        ]);
    }

    public function render()
    {
        return view('livewire.ver-tareas', ['tareas' => $this->tareas]); // Pasa las tareas a la vista
    }
}


