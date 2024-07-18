<?php

namespace App\Livewire;

use App\Models\Auditoria;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CalculoReport extends component
{   
    public $estado = 'TODOS';
    public $sec = '';
    public $desde;
    public $hasta;
    public $pdfUrl;


    public function GenerarReporte()
    {
        $url = route('propietarios.report'); // Sustituye 'nombre.ruta' por el nombre de tu ruta
        Auditoria::create([
            'user_id' => Auth::user()->id,
            'descripcion' => 'Generó reporte de calculos ',
            'fecha' => Carbon::now(),
        ]);
        // Llamar al método JavaScript para abrir la nueva pestaña
        
    }

    public function render()
    {
        return view('livewire.calculo-report');
    }
}