<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\WireUiActions;
use Livewire\Attributes\Validate;

class CreateUsuario extends ModalComponent
{

    use WireUiActions;
    public $usuario;
    #[Validate('required|string|max:40')] 
    public $nombre;
    public $tipo_documento;
    public $documento;
    public $codigo_telefono;
    public $telefono;
    public $estado = 'ACTIVO';
    public $email;
    public $direccion;
    public $password;
    public $rol;

    protected $rules = [
        'nombre' => 'required|string|max:40',
        'tipo_documento' => 'required|in:V-,E-,J-,P-,G-',
        'documento' => 'required|numeric|digits_between:1,20',
        'codigo_telefono' => 'nullable|in:0414, 0424, 0412, 0416',
        'telefono' => 'nullable|digits:7',
        'estado' => 'required|in:ACTIVO,INACTIVO',
        'email' => 'required|email',
        'password' => 'required',
        'rol' => 'required',
    ];


    public function submit()
    {
        $this->validate();
        ;

        $usuario = user::create([
            'name' => $this->nombre,
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'cod_telefono' => $this->codigo_telefono,
            'telefono' => $this->telefono,
            'password' => Hash::make($this->password),
            'email' => $this->email,
            'estado' => $this->estado,
        ]);
        $usuario->assignRole($this->rol);
        $this->successDialog();
        $this->dispatch('pg:eventRefresh-UserTable');
        $this->closeModal();
        // Reiniciar los campos del formulario
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'accion' => 'REGISTRO',
            'descripcion' => 'Creó usuario '.$this->nombre,
            'fecha' => Carbon::now(),
        ]);
        $this->reset();

    }
    public function successDialog(): void
    {
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'creado!',
            'description' => 'el usuario ha sido creado con exito.',
        ]);
    }
    public function render()
    {
        return view('livewire.create-usuario');
    }
    public static function modalMaxWidth(): string
{
    return 'xl';
}
}
