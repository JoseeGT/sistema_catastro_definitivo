<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use App\Models\Propietario;

class PropietariosReportController extends Controller
{
    public function generateInvoice(Request $request)
    {
        if($request->estado == 'TODOS'){
            $activos = Propietario::all();
        }else
        {
            $activos = Propietario::where('estado', $request->estado)->get();
            
        }

        // Crea una clase anónima que extienda FPDF
        $pdf = new class extends Fpdf {
            // Sobrescribe el método Header
            function Header()
            {
                // Mueve el cursor a la derecha y coloca las imágenes
                $this->Image(public_path("logo/logo_alcaldia.png"), 8, 10, 40);
                $this->Image(public_path("logo/logocatastro.png"), 170, 10, 30);
                $this->SetFont('Arial', '', 10);

                $this->SetY(18);
                $this->SetX(14);
                $this->Cell(0, 10, 'RIF: G200033746', 0, 0);
                // Título centrado
                $this->SetFont('Arial', '', 10);
                $this->SetY(10);
                $this->SetX(8);
                $this->Cell(0, 8, utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'), 0, 0, 'C');
                $this->Ln(4);
                $this->SetX(8);
                $this->Cell(0, 10, utf8_decode('ALCALDÍA DEL MUNICIPIO LIBERTADOR'), 0, 0, 'C');
                $this->Ln(5);
                $this->Cell(0, 10, 'PALO NEGRO - ESTADO ARAGUA', 0, 0, 'C');
                $this->Ln(5); 
                $this->Cell(0, 10, utf8_decode('DIRECCIÓN DE CATASTRO Y'), 0, 0, 'C');
                $this->Ln(5); 
                $this->Cell(0, 10, 'DESARROLLO URBANO', 0, 0, 'C');
                // Salto de línea
                $this->Ln(15);
            }
            // Sobrescribe el método Footer si lo deseas
            function Footer()
            {
                // Posición a 1.5 cm del final
                $this->SetY(-15);
                // Establece la fuente
                $this->SetFont('Arial', 'I', 8);
                // Número de página
                $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
            }
        };

        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Ln(5);
        $pdf->SetX(77);
        $pdf->Cell(55, 7, 'Reporte de Propietarios', "B", 1, 'C');
        $pdf->Ln(10);
        $pdf->SetFillColor(240, 235, 225);
        // Encabezado de la tabla
        // $pdf->SetFont('Arial', '', 10);
        // $pdf->Cell(60, 10, 'Filtrado por estado: '. $request->estado ,0,1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(65, 7, 'Nombre', 1,0, 'C');
        $pdf->Cell(30, 7, 'Tipo Documento', 1,0, 'C');
        $pdf->Cell(35, 7, 'Documento', 1,0, 'C');
        $pdf->Cell(40, 7, 'Telefono', 1,0, 'C');
        $pdf->Cell(20, 7, 'Estado', 1,0, 'C');
        $pdf->Ln();

        // Contenido de la tabla
        $pdf->SetFont('Arial', '', 10);
        foreach ($activos as $propietario) {
            $pdf->Cell(65, 7, utf8_decode($propietario->nombre), 1);
            $pdf->Cell(30, 7, utf8_decode($propietario->tipo_documento), 1,0, 'C');
            $pdf->Cell(35, 7, utf8_decode($propietario->documento), 1,0, 'C');
            if($propietario->codigo_telefono != null && $propietario->telefono != null){
            $pdf->Cell(40, 7, utf8_decode($propietario->codigo_telefono.'-'.$propietario->telefono), 1,0, 'C');
            }else{
                $pdf->Cell(40, 7, utf8_decode("------------------"), 1,0, 'C'); 
            }
            $pdf->Cell(20, 7, utf8_decode($propietario->estado), 1,0, 'C');
            $pdf->Ln();
        }


        $pdf->Output();
        exit;
    }
}
