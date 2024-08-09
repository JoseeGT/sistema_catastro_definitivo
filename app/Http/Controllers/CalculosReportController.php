<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use App\Models\Inmueble;
use App\Models\Calculo;
class CalculosReportController extends Controller
{
    public function generateInvoice(Request $request)
    {
        $query = Calculo::query();

        $query->join('inmuebles', 'inmuebles.id', '=', 'calculos.inmueble_id')
              ->orderBy('calculos.id', 'desc');

        if ($request->filled('desde') || $request->filled('hasta')) {
            // Asegúrate de convertir las fechas al formato correcto si no lo están
            $desde = date('Y-m-d', strtotime($request->desde));
            $hasta = date('Y-m-d', strtotime($request->hasta));
            $query->whereBetween('calculos.created_at', [$desde, $hasta]);
        }
        
        $activos = $query->with(['inmueble.propietario', 'inmueble.codigoCatastral', 'inmueble.direccion', 'inmueble.direccion.sector', 'inmueble.direccion.calle1', 'inmueble.direccion.calle2'])
                         ->get();
        $pdf = new class extends Fpdf {
            // Sobrescribe el método Header
            function Header()
            {
                // Mueve el cursor a la derecha y coloca las imágenes
                $this->Image(public_path("logo/logo_alcaldia.png"), 8, 8, 60);
                $this->Image(public_path("logo/logocatastro.png"), 170, 3, 30);
                
                // Título centrado
                $this->SetFont('Arial', '', 10);
                $this->SetY(25);
                $this->SetX(8);
                $this->Cell(0, 8, utf8_decode('REPÚBLICA BOLIVARIANA DE VENEZUELA'), 0, 0, 'C');
                $this->Ln(5);
                $this->SetX(8);
                $this->Cell(0, 10, utf8_decode('ALCALDÍA DEL MUNICIPIO LIBERTADOR'), 0, 0, 'C');
                $this->Ln(5);
                $this->Cell(0, 10, 'PALO NEGRO - ESTADO ARAGUA', 0, 0, 'C');
                $this->Ln(5);
                $this->Cell(0, 10, 'RIF: G200033746', 0, 0, 'C');
                $this->Ln(5); 
                $this->Cell(0, 10, utf8_decode('DIRECCIÓN DE CATASTRO Y'), 0, 0, 'C');
                $this->Ln(5); 
                $this->Cell(0, 10, 'DESARROLLO URBANO', 0, 0, 'C');
                // Salto de línea
                $this->Ln(10);

                $this->SetFont('Arial', 'B', 12);
                $this->Ln(5);
                $this->SetX(77);
                $this->Cell(55, 7, 'Reporte de Calculos', "B", 1, 'C');
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
            protected $widths;
            protected $aligns;
        
            function SetWidths($w)
            {
                // Set the array of column widths
                $this->widths = $w;
            }
        
            function SetAligns($a)
            {
                // Set the array of column alignments
                $this->aligns = $a;
            }
        
            function Row($data)
            {
                // Calculate the height of the row
                $nb = 0;
                for($i=0;$i<count($data);$i++)
                    $nb = max($nb,$this->NbLines($this->widths[$i],$data[$i]));
                $h = 5*$nb;
                // Issue a page break first if needed
                $this->CheckPageBreak($h);
                // Draw the cells of the row
                for($i=0;$i<count($data);$i++)
                {
                    $w = $this->widths[$i];
                    $a = isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
                    // Save the current position
                    $x = $this->GetX();
                    $y = $this->GetY();
                    // Draw the border
                    $this->Rect($x,$y,$w,$h);
                    // Print the text
                    $this->MultiCell($w,5,$data[$i],0,$a);
                    // Put the position to the right of the cell
                    $this->SetXY($x+$w,$y);
                }
                // Go to the next line
                $this->Ln($h);
            }
        
            function CheckPageBreak($h)
            {
                // If the height h would cause an overflow, add a new page immediately
                if($this->GetY()+$h>$this->PageBreakTrigger)
                    $this->AddPage($this->CurOrientation);
            }
        
            function NbLines($w, $txt)
            {
                // Compute the number of lines a MultiCell of width w will take
                if(!isset($this->CurrentFont))
                    $this->Error('No font has been set');
                $cw = $this->CurrentFont['cw'];
                if($w==0)
                    $w = $this->w-$this->rMargin-$this->x;
                $wmax = ($w-2*$this->cMargin)*1000/$this->FontSize;
                $s = str_replace("\r",'',(string)$txt);
                $nb = strlen($s);
                if($nb>0 && $s[$nb-1]=="\n")
                    $nb--;
                $sep = -1;
                $i = 0;
                $j = 0;
                $l = 0;
                $nl = 1;
                while($i<$nb)
                {
                    $c = $s[$i];
                    if($c=="\n")
                    {
                        $i++;
                        $sep = -1;
                        $j = $i;
                        $l = 0;
                        $nl++;
                        continue;
                    }
                    if($c==' ')
                        $sep = $i;
                    $l += $cw[$c];
                    if($l>$wmax)
                    {
                        if($sep==-1)
                        {
                            if($i==$j)
                                $i++;
                        }
                        else
                            $i = $sep+1;
                        $sep = -1;
                        $j = $i;
                        $l = 0;
                        $nl++;
                    }
                    else
                        $i++;
                }
                return $nl;
            }
        };
        $desde = $request->desde;
        $hasta = $request->hasta;
        $pdf->AddPage();

        $pdf->SetFillColor(240, 235, 225);
       // Encabezado de la tabla

       $pdf->SetFont('Arial', '', 10);
    //    $pdf->Cell(60, 10, 'Filtrado desde: '. $desde .'Filtrado hasta: '. $hasta ,0,1);
       $pdf->SetFont('Arial', 'B', 10);
       $pdf->Cell(8, 7,utf8_decode('N°'), 1, 0, 'C');
       $pdf->Cell(44, 7, 'Codigo Catastral', 1, 0, 'C');
       $pdf->Cell(65, 7, 'Direccion', 1, 0, 'C');
       $pdf->Cell(50, 7, 'Propietario', 1, 0, 'C');
       $pdf->Cell(21, 7, 'total', 1, 0, 'C');
       $pdf->Ln();


       // Contenido de la tabla
       $pdf->SetFont('Arial', '', 10);
       $pdf->SetWidths(array(8, 44, 65, 50, 21));

       foreach ($activos as $i => $calculos) {
         $i++;
           // Concatenar código catastral
           $codigoCatastral = $calculos->inmueble->codigoCatastral->sec . ' ' .
                              $calculos->inmueble->codigoCatastral->man . ' ' .
                              $calculos->inmueble->codigoCatastral->par . ' ' .
                              $calculos->inmueble->codigoCatastral->sbp . ' ' .
                              $calculos->inmueble->codigoCatastral->niv . ' ' .
                              $calculos->inmueble->codigoCatastral->uni;

           // Concatenar dirección
           $direccion = $calculos->inmueble->direccion->calle1->nombre . ' ' .
                        utf8_decode('Nro '). $calculos->inmueble->direccion->numero_civico . ' ' .
                        // $inmueble->direccion->calle2->nombre . ', ' .
                        $calculos->inmueble->direccion->nota . ', ' .
                        $calculos->inmueble->direccion->sector->nombre;

                        $pdf->Row(array($i, $codigoCatastral,utf8_decode($direccion), utf8_decode($calculos->inmueble->propietario->nombre)." ".$calculos->inmueble->propietario->tipo_documento .$calculos->inmueble->propietario->documento,$calculos->total." MMV"));

           // Agregar número de línea
        //    $pdf->Cell(10, 7, $i, 1, 0, 'C');
        //    $pdf->Cell(40, 7, utf8_decode($codigoCatastral), 1);
        //    $pdf->MultiCell(60, 7, utf8_decode($direccion), 1);
        //    $pdf->SetX(120); // Posición para siguiente celda
        //    $pdf->Cell(50, 7, utf8_decode($inmueble->propietario->nombre), 1);
        //    $pdf->Cell(40, 7, utf8_decode($inmueble->propietario->documento), 1);
        //    $pdf->Ln();
       }

        $pdf->Output();
        exit;
    }
}
