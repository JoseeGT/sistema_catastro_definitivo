<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Inmueble;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Unificar extends ModalComponent
{
    public $inmuebles_ids = [];
    
    protected $rules = [
        'inmuebles_ids' => 'required|array|min:2', // Al menos dos inmuebles para unificar
    ];

    public function submit()
    {
        $this->validate();

        // Inicializar las variables para las sumas de las áreas
        $suma_area_terreno = 0;
        $suma_area_construccion = 0;

        // Obtener el primer inmueble para usar sus datos en la creación del nuevo inmueble
        $primer_inmueble = Inmueble::with('codigoCatastral', 'direccion')->find($this->inmuebles_ids[0]);

        // Calcular la suma de las áreas de los inmuebles seleccionados
        foreach ($this->inmuebles_ids as $inmueble_id) {
            $inmueble = Inmueble::find($inmueble_id);
            if ($inmueble) {
                $suma_area_terreno += $inmueble->area_terreno;
                $suma_area_construccion += $inmueble->area_construccion;
            }
        }

        // Crear el nuevo inmueble unificado
        $nuevoInmueble = Inmueble::create([
            'area_terreno' => $suma_area_terreno,
            'area_construccion' => $suma_area_construccion,
            'propietario_id' => $primer_inmueble->propietario_id,
            'tipo_construccion_id' => $primer_inmueble->tipo_construccion_id,
            'tenencia_terreno_id' => $primer_inmueble->tenencia_terreno_id,
            'estado' => 'UNIFICACION INACTIVA',
            // Puedes ajustar los campos según tus necesidades
        ]);

        // Crear el código catastral del nuevo inmueble
        $nuevoInmueble->codigoCatastral()->create([
            'sec' => $primer_inmueble->codigoCatastral->sec ?? "000",
            'man' => $primer_inmueble->codigoCatastral->man ?? "000",
            'par' => $primer_inmueble->codigoCatastral->par ?? "000",
            'sbp' => $primer_inmueble->codigoCatastral->sbp ?? "000",
            'niv' => $primer_inmueble->codigoCatastral->niv ?? "000",
            'uni' => $primer_inmueble->codigoCatastral->uni ?? "000",
        ]);

        // Crear la dirección del nuevo inmueble
        $nuevoInmueble->direccion()->create([
            'calle1_id' => $primer_inmueble->direccion->calle1_id,
            'sector_id' => $primer_inmueble->direccion->sector_id,
            'numero_civico' => "000",
        ]);
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'accion' => 'UNIFICAR',
            'descripcion' => 'Unificó Inmuebles: '.json_encode($this->inmuebles_ids),
            'fecha' => Carbon::now(),
        ]);
        $this->dispatch('pg:eventRefresh-UnificacionesTable');

        // Cambiar el estado de cada inmueble original a "INACTIVO"
        // foreach ($this->inmuebles_ids as $inmueble_id) {
        //     $inmueble = Inmueble::find($inmueble_id);
        //     if ($inmueble) {
        //         $inmueble->update(['estado' => 'INACTIVO']);
        //     }
        // }

        // Reiniciar el arreglo para el siguiente reset
        $this->inmuebles_ids = [];
    }


}
