<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Calculo;
use Illuminate\Http\Request;
// use Spatie\LaravelPdf\Facades\Pdf;
use function Spatie\LaravelPdf\Support\pdf;
use Spatie\Browsershot\Browsershot;

class CalculoController extends Controller
{
    public function imprimir($id)
    {
        $calculo = Calculo::with('inmueble.propietario', 'inmueble.direccion.calle1', 'inmueble.direccion.calle2', 'inmueble.direccion.sector')->findOrFail($id);
        $propietario_nombre = $calculo->inmueble->propietario->nombre;
        $propietario_tipo_documento= $calculo->inmueble->propietario->tipo_documento;
        $propietario_documento= $calculo->inmueble->propietario->documento;
        $calle1 = $calculo->inmueble->direccion->calle1->nombre;
        $sector = $calculo->inmueble->direccion->sector->nombre;
        // $calle2= $calculo->inmueble->direccion->calle2_id->calle;
        // $sector= $calculo->inmueble->direccion->sector_id->nombre;

        //  dd($calculo);
        $pdf = PDF::loadView('formato', compact('calculo', 'propietario_nombre', 'propietario_tipo_documento', 'propietario_documento', 'calle1', 'sector'));
        $pdf->setPaper([0, 0, 300.772, 500]); // 80mm de ancho x altura automática

         return $pdf->stream();
    }
    public function imprimir2($id)
    {
        $calculo = Calculo::with('inmueble.propietario', 'inmueble.direccion.calle1', 'inmueble.direccion.calle2', 'inmueble.direccion.sector')->findOrFail($id);
        $propietario_nombre = $calculo->inmueble->propietario->nombre;
        $propietario_tipo_documento= $calculo->inmueble->propietario->tipo_documento;
        $propietario_documento= $calculo->inmueble->propietario->documento;
        $calle1 = $calculo->inmueble->direccion->calle1->nombre;
        $sector = $calculo->inmueble->direccion->sector->nombre;

        return pdf()
        ->view('formato', compact('propietario_nombre'))
        ->withBrowsershot(function (Browsershot $browsershot) {
            $browsershot->setNodeBinary("C:\Program Files/nodejs/node.exe");
            })
        ->name('invoice-2023-04-10.pdf');

    }
}
