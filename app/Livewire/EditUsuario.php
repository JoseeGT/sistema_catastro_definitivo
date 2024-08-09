<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Livewire\Component;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\WireUiActions;
use Illuminate\Support\Facades\Auth;

class EditUsuario extends ModalComponent
{
    use WireUiActions;

    public $model;
    public $nombre;
    public $tipo_documento;
    public $documento;
    public $codigo_telefono;
    public $telefono;
    public $estado = 'ACTIVO';
    public $email;
    public $password;

    protected $rules = [
        'nombre' => 'required|string|max:40',
        'tipo_documento' => 'required|in:V-,E-,J-,P-,G-',
        'documento' => 'required|numeric|digits_between:1,20',
        'codigo_telefono' => 'nullable|in:0414,0424,0412,0416',
        'telefono' => 'nullable|digits:7',
        'estado' => 'required|in:ACTIVO,INACTIVO',
        'email' => 'required|email',
        'password' => 'nullable|string|min:8', // La contraseña es opcional al editar
    ];

    public function mount($id)
    {
        $this->model = User::find($id);
        $this->nombre = $this->model->name;
        $this->tipo_documento = $this->model->tipo_documento;
        $this->documento = $this->model->documento;
        $this->codigo_telefono = $this->model->cod_telefono;
        $this->telefono = $this->model->telefono;
        $this->estado = $this->model->estado;
        $this->email = $this->model->email;
    }

    public function submit()
    {
        $this->validate();

        $data = [
            'name' => $this->nombre,
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'cod_telefono' => $this->codigo_telefono,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'estado' => $this->estado,
        ];

        // Si se proporciona una nueva contraseña, agrégala a los datos a actualizar
        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        $this->model->update($data);

        $this->successDialog();
        $this->dispatch('pg:eventRefresh-UserTable');
        $this->closeModal();
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'accion' => 'EDITAR',
            'descripcion' => 'Editó Usuario: '.$this->nombre,
            'fecha' => Carbon::now(),
        ]);
        // Reiniciar los campos del formulario
        $this->reset();
    }

    public function successDialog(): void
    {
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Actualizado!',
            'description' => 'El usuario ha sido actualizado con éxito.',
        ]);

    }

    public function render()
    {
        return view('livewire.edit-usuario');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}

