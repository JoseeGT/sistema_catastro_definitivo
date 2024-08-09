<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Sector;
use App\Models\Calle;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;

class SectoresCalles extends ModalComponent
{   
    public $tipo;
    public $nombre;
     protected $rules = [
        'nombre' => 'required|string|max:40',
        'tipo' => 'required',
     ];

     public function submit()
     {
         $this->validate();

         if ($this->tipo == 'calle') {
             Calle::create([
                 'nombre' => $this->nombre,
                 
             ]);
             Auditoria::create([
                'user_id' => Auth::user()->id,
                'accion' => 'REGISTRO',
                'descripcion' => 'Registró calle: '.$this->nombre,
                'fecha' => Carbon::now(),
            ]);
         }else{
             Sector::create([
                 'nombre' => $this->nombre,
             ]);
             Auditoria::create([
                'user_id' => Auth::user()->id,
                'accion' => 'REGISTRO',
                'descripcion' => 'Registró Sector: '.$this->nombre,
                'fecha' => Carbon::now(),
            ]);
         }
         $this->dispatch('pg:eventRefresh-sectorTable');
         $this->dispatch('pg:eventRefresh-calleTable');
         $this->reset();

         $this->closeModal();
        }




     public function render()
     {
         return view('livewire.sectores-calles');
     }
    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
