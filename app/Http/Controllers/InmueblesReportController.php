<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use App\Models\Inmueble;

class InmueblesReportController extends Controller
{
    public function generateInvoice(Request $request)
    {
        $query = Inmueble::query();

        if ($request->filled('estado') && $request->estado !== 'TODOS') {
            $query->where('estado', $request->estado);
        }
        
        if ($request->filled('sec')) {
            $query->whereHas('codigoCatastral', function ($q) use ($request) {
                $q->where('sec', $request->sec);
            });
        }
        
        // Ordenar por el código catastral
        $query->join('codigos_catastrales', 'inmuebles.id', '=', 'codigos_catastrales.inmueble_id')
              ->orderBy('codigos_catastrales.sec', 'asc')
              ->orderBy('codigos_catastrales.man', 'asc')
              ->orderBy('codigos_catastrales.par', 'asc')
              ->orderBy('codigos_catastrales.sbp', 'asc')
              ->orderBy('codigos_catastrales.niv', 'asc')
              ->orderBy('codigos_catastrales.uni', 'asc');
        
        // Cargar las relaciones necesarias
        $activos = $query->with(['propietario', 'direccion', 'direccion.sector', 'direccion.calle1', 'direccion.calle2'])->get();
        
        // Crea una clase anónima que extienda FPDF
        $pdf = new class extends Fpdf {
            // Sobrescribe el método Header
            function Header()
            {
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
                $this->Ln(5);
                $this->SetX(8);
                $this->Cell(0, 10, utf8_decode('ALCALDÍA DEL MUNICIPIO LIBERTADOR'), 0, 0, 'C');
                $this->Ln(5);
                $this->Cell(0, 10, 'PALO NEGRO - ESTADO ARAGUA', 0, 0, 'C');
                $this->Ln(5); 
                $this->Cell(0, 10, utf8_decode('DIRECCIÓN DE CATASTRO Y'), 0, 0, 'C');
                $this->Ln(5); 
                $this->Cell(0, 10, 'DESARROLLO URBANO', 0, 0, 'C');
                // Salto de línea
                $this->Ln(10);

                $this->SetFont('Arial', 'B', 12);
                $this->Ln(5);
                $this->SetX(77);
                $this->Cell(55, 7, 'Reporte de Inmuebles', "B", 1, 'C');
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

        $pdf->AddPage();

        $pdf->SetFillColor(240, 235, 225);
       // Encabezado de la tabla
       $pdf->SetFont('Arial', 'B', 10);
       $pdf->Cell(8, 7,utf8_decode('N°'), 1, 0, 'C');
       $pdf->Cell(44, 7, 'Codigo Catastral', 1, 0, 'C');
       $pdf->Cell(53, 7, 'Direccion', 1, 0, 'C');
       $pdf->Cell(53, 7, 'Nombre del Propietario', 1, 0, 'C');
       $pdf->Cell(30, 7, 'Documento', 1, 0, 'C');
       $pdf->Ln();


       // Contenido de la tabla
       $pdf->SetFont('Arial', '', 10);
       $pdf->SetWidths(array(8, 44, 53, 53, 30));

       foreach ($activos as $i => $inmueble) {
         $i++;
           // Concatenar código catastral
           $codigoCatastral = $inmueble->codigoCatastral->sec . ' ' .
                              $inmueble->codigoCatastral->man . ' ' .
                              $inmueble->codigoCatastral->par . ' ' .
                              $inmueble->codigoCatastral->sbp . ' ' .
                              $inmueble->codigoCatastral->niv . ' ' .
                              $inmueble->codigoCatastral->uni;

           // Concatenar dirección
           $direccion = $inmueble->direccion->calle1->nombre . ' ' .
                        utf8_decode('Nro. '). $inmueble->direccion->numero_civico . ' ' .
                        // $inmueble->direccion->calle2->nombre . ', ' .
                        $inmueble->direccion->nota . ', ' .
                        "S/".$inmueble->direccion->sector->nombre;

                        $pdf->Row(array($i, $codigoCatastral,utf8_decode($direccion), utf8_decode($inmueble->propietario->nombre),$inmueble->propietario->tipo_documento .$inmueble->propietario->documento));

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
