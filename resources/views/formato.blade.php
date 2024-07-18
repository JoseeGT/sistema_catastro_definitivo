<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Aloha!</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif;
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
</style>

</head>
<body>

  <table width="100%">
    <tr>
        <td valign="top"></td>
        <td align="right">
            <h3>Shinra Electric power company</h3>
            <pre>
                Company representative name
                Company address
                Tax ID
                phone
                fax
                a
                a
                a
            </pre>
        </td>
    </tr>

  </table>

  <table width="100%">
    <tr>
        <td><strong>From:</strong> Linblum - Barrio teatral</td>
        <td><strong>To:</strong> Linblum - Barrio Comercial</td>
    </tr>

  </table>

  <br/>

  <table width="100%">
    <thead style="background-color: lightgray;">
      <tr>
        <th>#</th>
        <th>Description</th>
        <th>Quantity</th>
        <th>Unit Price $</th>
        <th>Total $</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Playstation IV - Black</td>
        <td align="right">1</td>
        <td align="right">1400.00</td>
        <td align="right">1400.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Metal Gear Solid - Phantom</td>
          <td align="right">1</td>
          <td align="right">105.00</td>
          <td align="right">105.00</td>
      </tr>
      <tr>
          <th scope="row">1</th>
          <td>Final Fantasy XV - Game</td>
          <td align="right">1</td>
          <td align="right">130.00</td>
          <td align="right">130.00</td>
      </tr>
    </tbody>

    <tfoot>
        <tr>
            <td colspan="3"></td>
            <td align="right">Subtotal $</td>
            <td align="right">1635.00</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Tax $</td>
            <td align="right">294.3</td>
        </tr>
        <tr>
            <td colspan="3"></td>
            <td align="right">Total $</td>
            <td align="right" class="gray">$ 1929.3</td>
        </tr>
    </tfoot>
  </table>

</body>
</html>


{{-- <html>
    <head>
        <style>
            body { font-family: Arial, sans-serif; font-size: 10px; }
            .header { text-align: center; margin-bottom: 10px}
            .invoice-details { margin-bottom: 10px; }
            .total { font-weight: bold; }
        </style>
    </head>
    <body>
        
        <div class="header">
            <h2>Factura #{{$calculo->id}}</h2>     
            <p>Fecha: .{{$calculo->created_at}}</p>

        </div>
        <div class="invoice-details">
            <p>Propietario: .{{$propietario_nombre}}  </p>
            <p>  documento: . {{$propietario_tipo_documento }} {{$propietario_documento}} </p>
            <p>  dirección: . {{$calle1}} . '</p>
            <p>Sector: ' . $this->sector . '</p>
            
        </div>
        <table width="100%">
            <tr>
                <td>Impuesto Construcción</td>
                <td> {{$calculo->impuesto_construccion}} MMV</td>
            </tr>

            <tr>
                <td>Impuesto Terreno</td>
                <td> {{$calculo->impuesto_terreno}} MMV</td>
            </tr>

            <tr>
                <td>Acueducto</td>
                <td> {{$calculo->acueducto ? '5.40' : '0.00'}} MMV</td>
            </tr>
            <tr>
                <td>Cloaca</td>
                <td>' . number_format($this->cloaca, 2) . '</td>
            </tr>
            <tr>
                <td>Ficha Catastral</td>
                <td>' . number_format($this->ficha_catastral, 2) . '</td>
            </tr>
            <tr>
                <td>Art 91</td>
                <td>' . number_format($this->art_91, 2) . '</td>
            </tr>
            <tr>
                <td>Solvencia</td>
                <td>' . number_format($this->solvencia, 2) . '</td>
            </tr>
            <tr>
                <td>Inspección</td>
                <td>' . number_format($this->inspeccion, 2) . '</td>
            </tr>
            <tr>
                <td>Plano Mensura</td>
                <td>' . number_format($this->plano_mensura, 2) . '</td>
            </tr>
            <tr class="total">
                <td>Total</td>
                <td>' . number_format($this->total, 2) . '</td>
            </tr>
        </table>
    </body>

</html> --}}
