<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Livewire\Component;
use App\Models\Propietario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\WireUiActions;
use Livewire\Attributes\Validate;

class CreatePropietario extends ModalComponent
{

    use WireUiActions;
    #[Validate('required|string|max:40')] 
    public $nombre;
    #[Validate('required|in:V-,E-,J-,P-,G-')] 
    public $tipo_documento;
    #[Validate('required|numeric')] 
    public $documento;
    public $codigo_telefono;
    public $telefono;
    public $estado = 'ACTIVO';

    protected $rules = [
        'nombre' => 'required|string|max:40',
        'tipo_documento' => 'required|in:V-,E-,J-,P-,G-',
        'documento' => 'required|numeric|digits_between:1,20',
        'codigo_telefono' => 'nullable|in:0414, 0424, 0412, 0416',
        'telefono' => 'nullable|digits:7',
        'estado' => 'required|in:ACTIVO,INACTIVO',
    ];

    public function submit()
    {
        $this->validate();

        Propietario::create([
            'nombre' => $this->nombre,
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'codigo_telefono' => $this->codigo_telefono,
            'telefono' => $this->telefono,
            'estado' => $this->estado,
        ]);
        $this->successDialog();
        session()->flash('message', 'Propietario creado exitosamente.');
        $this->dispatch('pg:eventRefresh-PropietarioTable');
        $this->closeModal();
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'Registró propietario: '.$this->nombre,
            'fecha' => Carbon::now(),
        ]);
        // Reiniciar los campos del formulario
        $this->reset();

    }
    public function successDialog(): void
    {
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'creado!',
            'description' => 'el propietario ha sido creado con exito.',
        ]);
    }
    public function render()
    {
        return view('livewire.create-propietario');
    }
    public static function modalMaxWidth(): string
{
    return 'xl';
}
}
