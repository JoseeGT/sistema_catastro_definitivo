<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function generateInvoice(Request $request)
    {   
  // Decodificar el JSON de la solicitud
  $data = json_decode($request->input('data'), true);

  // Verificar que el JSON se decodificó correctamente y que es un array
  if (json_last_error() !== JSON_ERROR_NONE) {
      throw new \Exception('Error al decodificar el JSON: ' . json_last_error_msg());
  }

  // Verificar que el elemento tenga la clave 'id'
  if (!isset($data['id'])) {
      throw new \Exception('El elemento no contiene la clave "id".');
  }

  // Obtener el año actual en formato YY
  $year = Carbon::now()->format('y');

  // Formatear el ID con ceros a la izquierda hasta 4 dígitos
  $id = str_pad($data['id'], 4, '0', STR_PAD_LEFT);

  // Agregar la columna 'ref'
  $data['ref'] = $year . '-' . $id;

  // Crear objeto PDF
  $pdf = new Fpdf('P', 'mm', array(80, 150)); // 80mm width, 150mm height
  $pdf->AddPage();

  // Debugging: mostrar el contenido de $data
//   dd($data);
        // dd($data);
        
        $pageWidth = 80;
        $pageHeight = 150;
        $margin = 5;

        $pdf->SetAutoPageBreak(1 ,10);
        $pdf->SetFillColor(221, 224, 235);
        $this->header($pdf,80,150,5);
        // Add header function
        
        // Set margins
        $pdf->SetMargins($margin, $margin);
        $pdf->SetFont('Arial', '', 9);
        
        $pdf->Image(public_path("logo\logocatastro.png"),6,6,20);
        // Fecha y número de factura
        $pdf->SetX(35);
        $pdf->Cell(20, 6, 'FECHA: ', 0, 0, "R");
        $pdf->SetFont('Arial', 'u', 9);

        $pdf->Cell(20, 6,Carbon::parse($data["fecha"])->format('d/m/Y'), 0, 1, "L");
        $pdf->Ln(3);

        $pdf->SetX(0);
        $pdf->Cell(80, 6, '#'.$data["ref"], 0, 1, "C");
        $pdf->Ln(3);
        // Código Catastral , Propietario Y C.i
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(30, 6, 'COD.CATASTRAL: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->MultiCell(0, 6, $data["sec"]."-".$data["man"]."-".$data["par"]."-".$data["sbp"]."-".$data["niv"]."-".$data["uni"] , 0,"L");
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(25, 6, 'PROPIETARIO: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(0, 6,  utf8_decode($data["propietario_nombre"]), 0, 1,"L");

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(24, 6, 'DOCUMENTO: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(0, 6, $data["propietario_td"].$data["propietario_d"], 0, 1,"L");
        // Cédula y Dirección
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(22, 6, 'DIRECCION: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->MultiCell(45, 5, utf8_decode($data["calle1_nombre"]." ".$data["calle2_id"]." N° " .$data["numero_civico"]." ".$data["nota"]." ".$data["sector_nombre"]), 0, 1);

        $pdf->Ln(5); // Espacio

        // Impuestos y descuentos
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(10, 6, 'IMP.C: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(25, 6, "". $data["impuesto_construccion"]." MMV ", 0, 0,"C");
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(14, 6, 'IMP.T: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6, "". $data["impuesto_terreno"]." MMV ", 0, 1,"C");
       
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(35, 6, 'DESCUENTO :', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6, "      ".pow($data["descuento"],1)."%       ", 0, 1,"C");
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(33, 6, 'TOTAL PROPIEDAD :', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6, "   ". $data["sub_total"]."MMV ", 0, 1,"L");
        $pdf->Ln(2); // Espacio

        // Servicios
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(23, 6, 'ACUEDUCTO: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6, ($data["acueducto"]==1 ? 10.80 ."MMV   " : '------------'), 0, 0,"C");
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(16, 6, 'CLOACA: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6,  ($data["cloaca"]==1 ? 5.40 ." MMV " : '------------'), 0, 1,"C");

        $pdf->Ln(5); // Espacio

        // Planilla, Art.91, Solvencia, Inspecciones y Plano de Mensura
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(25, 6, 'F.CATASTRAL: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6,  ($data["ficha_catastral"]==1 ? 15 ." MMV " : '------------'), 0, 1,"C");

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(15, 5, 'ART. 91: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6,  ($data["art_91"]==1 ? 1.32 ." MMV " : '------------'), 0, 1,"C");

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(21, 5, 'SOLVENCIA: ', 0,     0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6,  ($data["solvencia"]==1 ? 15 ." MMV " : '------------'), 0, 1,"C");

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(24, 5, 'INSPECCION: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6,  ($data["inspeccion"]=! 0 ? $data["inspeccion"] ." MMV " : '------------'), 0, 1,"C");

        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(30, 5, 'PLANO DE MENS.: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 6,  ($data["plano_mensura"]==1 ? 15 ." MMV " : '------------'), 0, 1,"C");
        $pdf->Ln(3); // Espacio

        // TOTAL
        
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(20, 5, 'TOTAL.: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(25, 6, $data["total"]." MMV ", 0, 1,"C","fill");

        // Funcionario
/*         $pdf->SetXY(5,-15);
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(27, 5, 'FUNCIONARIO.: ', 0, 0);
        $pdf->SetFont('Arial', 'u', 9);
        $pdf->Cell(14, 5, ' NOMBRE ', 0, 1,"C"); */
        $pdf->Output();

        exit;
    }

    public function header($pdf, $pageWidth, $pageHeight, $margin)
    {
        $pdf->Rect($margin, $margin, $pageWidth - $margin * 2, $pageHeight - $margin * 2);
    }

}