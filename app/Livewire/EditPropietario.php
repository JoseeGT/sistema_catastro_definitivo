<?php

namespace App\Livewire;

use App\Models\Auditoria;
use LivewireUI\Modal\ModalComponent;
use App\Models\Propietario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditPropietario extends ModalComponent
{
    
    public $propietario;
    public $nombre;
    public $tipo_documento;
    public $documento;
    public $codigo_telefono;
    public $telefono;
    public $estado = 'ACTIVO';
    protected static array $maxWidths = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
        '3xl' => 'sm:max-w-3xl',
        '4xl' => 'sm:max-w-4xl',
        '5xl' => 'sm:max-w-5xl',
        '6xl' => 'sm:max-w-6xl',
        '7xl' => 'sm:max-w-7xl',
        'full' => 'sm:max-w-full',
    ];

    /**
     * Supported: 'sm', 'md', 'lg', 'xl', '2xl', '3xl', '4xl', '5xl', '6xl', '7xl'
     */
    public static function modalWidth(): string
    {
        return '4xl';
    }
    protected $rules = [
        'nombre' => 'required|string|max:40',
        'tipo_documento' => 'required|in:V-,E-,J-,P-,G-',
        'documento' => 'required|numeric|digits_between:1,20',
        'codigo_telefono' => 'nullable|in:0414,0424,0412,0416',
        'telefono' => 'nullable|digits:7',
        'estado' => 'required|in:ACTIVO,INACTIVO',
    ];
    public function mount($id){
        $this->propietario = Propietario::find($id);
        $this->nombre = $this->propietario->nombre;
        $this->tipo_documento = $this->propietario->tipo_documento;
        $this->documento = $this->propietario->documento;
        $this->codigo_telefono = $this->propietario->codigo_telefono;
        $this->telefono = $this->propietario->telefono;
        $this->estado = $this->propietario->estado;
    }


    public function submit()
    {
        $this->validate();

        $this->propietario->update([
            'nombre' => $this->nombre,
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'codigo_telefono' => $this->codigo_telefono,
            'telefono' => $this->telefono,
            'estado' => $this->estado,
        ]);
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'accion' => 'EDITAR',
            'descripcion' => 'Editó propietario: '.$this->nombre,
            'fecha' => Carbon::now(),
        ]);
        $this->closeModal();
        $this->dispatch('pg:eventRefresh-PropietarioTable');
    }
    public function render()
    {
        return view('livewire.edit-propietario');
    }
}
