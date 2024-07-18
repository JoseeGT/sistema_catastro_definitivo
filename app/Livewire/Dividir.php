<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Inmueble;
use App\Models\Division;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Dividir extends ModalComponent
{
    public $inmueble_id;
    public $num_lotes;

    protected $rules = [
        'inmueble_id' => 'required|integer',
        'num_lotes' => 'required|integer',
    ];

    public function submit()
    {
        $this->validate();

        $inmueble = Inmueble::with('codigoCatastral', 'direccion')->find($this->inmueble_id);

        for ($i = 1; $i <= $this->num_lotes; $i++) {
            // Crear un nuevo lote
            $lote = Inmueble::create([
                'area_terreno' => 0,
                'area_construccion' => 0,
                'tipo_construccion_id' => $inmueble->tipo_construccion_id,
                'tenencia_terreno_id' => $inmueble->tenencia_terreno_id,
                'propietario_id' => $inmueble->propietario_id,
                'estado' => 'DIVISION INACTIVA'
            ]);

            // Crear el código catastral del nuevo lote usando los valores del inmueble original
            $lote->codigoCatastral()->create([
                'sec' => $inmueble->codigoCatastral->sec ?? '000',
                'man' => $inmueble->codigoCatastral->man ?? '000',
                'par' => $inmueble->codigoCatastral->par ?? '000',
                'sbp' => $inmueble->codigoCatastral->sbp ?? '000',
                'niv' => $inmueble->codigoCatastral->niv ?? '000',
                'uni' => $inmueble->codigoCatastral->uni ?? '000',
            ]);

            // Crear la dirección del nuevo lote usando los valores de la dirección del inmueble original
            $lote->direccion()->create([
                'calle1_id' => $inmueble->direccion->calle1_id,
                'sector_id' => $inmueble->direccion->sector_id,
                'numero_civico' => '000',
                'nota' => "Lote $i",
            ]);

            // Crear la entrada de división
            Division::create([
                'lote_original_id' => $inmueble->id,
                'lote_dividido_id' => $lote->id,
            ]);
        }
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'Dividió Inmueble' .$inmueble->codigoCatastral->sec.'-'.$inmueble->codigoCatastral->man.'-'.$inmueble->codigoCatastral->par,
            'fecha' => Carbon::now(),
        ]);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.dividir');
    }
}
