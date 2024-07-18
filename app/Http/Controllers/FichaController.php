<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Dompdf\Dompdf as DompdfLib;
use NcJoes\OfficeConverter\OfficeConverter;
use Symfony\Component\Process\Process;
use App\Models\Inmueble;
use Carbon\Carbon;

class FichaController extends Controller
{   
    public function ejemplo($id_ficha)
    {   
        $ficha = Ficha::find($id_ficha);
        $inmueble = Inmueble::with('direccion.calle1', 'direccion.calle2',
         'direccion.sector', 'propietario', 'documento', 'tenenciaTerreno')
        ->find($ficha->inmueble_id);
        $ficha = Ficha::find($id_ficha);
        
        $codigoConcatenado = implode('-', [
            $inmueble->codigoCatastral->sec,
            $inmueble->codigoCatastral->man,
            $inmueble->codigoCatastral->par,
            $inmueble->codigoCatastral->sbp,
            $inmueble->codigoCatastral->niv,
            $inmueble->codigoCatastral->uni
        ]);

        // dd($inmueble);
        // Ruta del archivo de entrada y salida
        $filePath = public_path('fichas/formato_ficha_catastral.xlsx');
        $editedFilePath = public_path('fichas/'.'ficha '.$codigoConcatenado.'.xlsx');

        $outputPdfPath = public_path('fichas/formato1.pdf');
        $bin = 'C:\Program Files\LibreOffice\program\scalc.exe';

        // Verificar si el archivo existe
        if (!file_exists($filePath)) {
            return response()->json(['error' => 'El archivo no existe.'], 404);
        }
        
        // Cargar el archivo existente
        $spreadsheet = IOFactory::load($filePath);
        $worksheet = $spreadsheet->getActiveSheet();

        // Datos del inmueble
        $sec = str_split($inmueble->codigoCatastral->sec);
        $man = str_split($inmueble->codigoCatastral->man);
        $par = str_split($inmueble->codigoCatastral->par);
        $sbp = str_split($inmueble->codigoCatastral->sbp);
        $niv = str_split($inmueble->codigoCatastral->niv);
        $uni = str_split($inmueble->codigoCatastral->uni);

        // Array de los valores para facilitar la asignación, mapeando la columna inicial para cada parte
        $values = [
            'O' => $sec,
            'R' => $man,
            'U' => $par,
            'X' => $sbp,
            'AA' => $niv,
            'AD' => $uni
        ];

        // Asignar los valores a las celdas
        foreach ($values as $startColumn => $valueArray) {
            for ($i = 0; $i < count($valueArray); $i++) {
                // Obtiene la columna correcta sumando el índice a la columna inicial
                $currentColumn = chr(ord($startColumn) + $i);
                $cell = $currentColumn . '5';
                $worksheet->getCell($cell)->setValue($valueArray[$i]);
            }
        }
        $fechaFormateada = Carbon::createFromTimestamp($ficha->fecha)->format('d/M/Y');

        $worksheet->getCell('S7')->setValue(date('d-m-Y'));

        // Establecer valores en celdas específicas
        $worksheet->getCell('N14')->setValue($inmueble->propietario->nombre);
        $worksheet->getCell('K16')->setValue($inmueble->propietario->tipo_documento.$inmueble->propietario->documento);
        $worksheet->getCell('D19')->setValue($inmueble->direccion->calle1->nombre. " ".$inmueble->direccion->nota);
        $worksheet->getCell('D20')->setValue("N°".$inmueble->direccion->numero_civico);
        $worksheet->getCell('K20')->setValue($inmueble->direccion->sector->nombre);
        $worksheet->getCell('G23')->setValue($inmueble->area_terreno_sd);
        $worksheet->getCell('G24')->setValue($inmueble->area_construccion_sd);
        $worksheet->getCell('T23')->setValue($inmueble->area_terreno);
        $worksheet->getCell('T24')->setValue($inmueble->area_construccion);
        $worksheet->getCell('E27')->setValue($inmueble->Lindero_norte);
        $worksheet->getCell('E29')->setValue($inmueble->Lindero_sur);
        $worksheet->getCell('E31')->setValue($inmueble->Lindero_este);
        $worksheet->getCell('E33')->setValue($inmueble->Lindero_oeste);

        // Datos del documento 
        $worksheet->getCell('G36')->setValue($inmueble->documento->tipo_operacion);
        $worksheet->getCell('D37')->setValue($inmueble->documento->fecha);
        $worksheet->getCell('K37')->setValue($inmueble->documento->num);
        $worksheet->getCell('Y37')->setValue($inmueble->documento->folio);
        $worksheet->getCell('D38')->setValue($inmueble->documento->protocolo);
        $worksheet->getCell('N38')->setValue($inmueble->documento->matricula);
        $worksheet->getCell('AA38')->setValue($inmueble->documento->timestre);
        $worksheet->getCell('D39')->setValue($inmueble->tenenciaTerreno->nombre);
        $worksheet->getCell('H41')->setValue($inmueble->documento->observaciones);

        // Guardar el archivo editado en formato XLSX
        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($editedFilePath);

        $filename = 'ficha ' . $codigoConcatenado . '.xlsx';


        $excelficha = file_get_contents($editedFilePath);
        unlink($editedFilePath);

        return response($excelficha, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }
}
