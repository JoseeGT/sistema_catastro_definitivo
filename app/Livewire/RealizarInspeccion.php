<?php
namespace App\Livewire;

use App\Models\Auditoria;
use App\Models\Inmueble;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Inspeccion as InspeccionModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class RealizarInspeccion extends ModalComponent
{
    use WithFileUploads;

    public $path_mostrar;
    public $propietario;
    public $calle1;
    public $calle2;
    public $sector;
    public $inmueble_id;
    public $inmueble;
    public $codigo_catastral_id;
    public $sec;
    public $man;
    public $par;
    public $sbp;
    public $niv;
    public $uni;
    public $propietarios;
    public $propietario_id;
    public $calle_id;
    public $sector_id;
    public $numero_civico;
    public $nota;
    public $area_terreno;
    public $area_construccion;
    public $area_terreno_sd;
    public $area_construccion_sd;
    public $tenencia_terreno_id;
    public $inspeccion;
    public $fecha_inspeccion;
    public $nota_inspeccion;
    public $estado = 'pendiente';
    public $inspector_id = 1;
    public $lindero_norte;
    public $lindero_sur;
    public $lindero_este;
    public $lindero_oeste;
    public $plano;
    public $planoPath;
    public $previousPlanoPath;

    public $planoPreviewUrl;

    protected $rules = [
        'area_terreno' => 'required|numeric',
        'area_construccion' => 'required|numeric',
        'lindero_norte' => 'max:50|required',
        'lindero_sur' => 'max:50|required',
        'lindero_este' => 'max:50|required',
        'lindero_oeste' => 'max:50|required',
    ];

    public function updatedPlano()
    {
        $this->validate([
            'plano' => 'mimes:pdf|max:2048',
        ]);
    
        if ($this->plano) {
            // Guarda el nuevo archivo y obtiene la nueva ruta
            $newPlanoPath = $this->plano->store('planos', 'public');
            $this->planoPath = $newPlanoPath;
            // Actualiza la URL de vista previa
            $this->planoPreviewUrl = Storage::url($newPlanoPath);
            
            // Elimina el archivo anterior si existe
            if ($this->previousPlanoPath && Storage::exists($this->previousPlanoPath)) {
                Storage::delete($this->previousPlanoPath);
            }
            
            // Actualiza la ruta del archivo anterior
            $this->previousPlanoPath = $newPlanoPath;
        }
    }
    

    public function mount($id)
    {
        $this->inspeccion = InspeccionModel::findOrFail($id);
        $this->inmueble_id = $this->inspeccion->inmueble_id;
        $this->inmueble = Inmueble::find($this->inmueble_id);
        $this->planoPath = $this->inmueble->plano_path;
        // $this->planoPreviewUrl = $this->planoPath ? Storage::url($this->planoPath) : null;

        // Asignar valores a las propiedades del componente
        $this->propietario = $this->inmueble->propietario->nombre;
        $this->calle_id = $this->inmueble->direccion->calle1->id;
        $this->sector_id = $this->inmueble->direccion->sector->id;
        $this->numero_civico = $this->inmueble->direccion->numero_civico;
        $this->nota = $this->inmueble->direccion->nota;
        $this->sec = $this->inmueble->codigoCatastral->sec;
        $this->man = $this->inmueble->codigoCatastral->man;
        $this->par = $this->inmueble->codigoCatastral->par;
        $this->sbp = $this->inmueble->codigoCatastral->sbp;
        $this->niv = $this->inmueble->codigoCatastral->niv;
        $this->uni = $this->inmueble->codigoCatastral->uni;
        $this->area_construccion = $this->inmueble->area_construccion;
        $this->area_terreno = $this->inmueble->area_terreno;
        $this->lindero_norte = $this->inmueble->Lindero_norte;
        $this->lindero_sur = $this->inmueble->Lindero_sur;
        $this->lindero_este = $this->inmueble->Lindero_este;
        $this->lindero_oeste = $this->inmueble->Lindero_oeste;
    }

    public function save()
    {
        // Validar los datos del formulario
        $rules = $this->rules;

        if (is_null($this->planoPath)) {
            $rules['plano'] = 'required|mimes:pdf|max:2048';
        }

        $this->validate($rules);

        // Verificar si hay un archivo plano y almacenarlo
        if ($this->plano) {
            $this->planoPath = $this->planoPreviewUrl/* store('planos', 'public') */;
        }

        // Actualizar el modelo Inmueble con los datos del formulario
        $this->inmueble->update([
            'area_construccion' => $this->area_construccion,
            'area_terreno' => $this->area_terreno,
            'Lindero_norte' => $this->lindero_norte,
            'Lindero_sur' => $this->lindero_sur,
            'Lindero_este' => $this->lindero_este,
            'Lindero_oeste' => $this->lindero_oeste,
            'plano_path' => $this->planoPath,
        ]);

        // Actualizar el estado de la inspección
        $this->inspeccion->update([
            'estado' => 'realizada',
        ]);

        // Registrar la auditoría
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'accion' => 'INSPECCION',
            'descripcion' => 'completó inspección inmueble ' . $this->sec . " " . $this->man . " " . $this->par . " " . $this->sbp . " " . $this->niv . " " . $this->uni,
            'fecha' => Carbon::now(),
        ]);


        // Cerrar el modal
        $this->dispatch('pg:eventRefresh-InspeccionTable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.realizar-inspeccion');
    }
}
