<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Livewire\Component;
use App\Models\Calle;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;

class EditCalle extends ModalComponent
{   
    public $calle;
    public $nombre;
    protected $rules = [
        'nombre' => 'required|max:40',
    ];
    public function mount($id)
    {
        $this->calle = Calle::findorfail($id);
        $this->nombre = $this->calle->nombre;
    }

    public function submit()
    {
        $this->validate();
        $this->calle->update([
            'nombre' => $this->nombre
        ]);
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'accion' => 'EDITAR',

            'descripcion' => 'Editó Calle: '.$this->nombre,
            'fecha' => Carbon::now(),
        ]);
        $this->closeModal();
        $this->dispatch('pg:eventRefresh-calleTable');
    }

    public function render()
    {
        return view('livewire.edit-calle');
    }
    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
