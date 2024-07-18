<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\Inmueble;
use App\Models\Propietario;
use Illuminate\Support\Facades\DB;

class InmuebleController extends Controller
{
    public function __invoke(Request $request)
    {   
        $inmuebles = Inmueble::query()
            ->select(
                'inmuebles.id as id',
                'propietarios.nombre as propietario',
                DB::raw("CONCAT_WS(' ', propietarios.tipo_documento, propietarios.documento, propietarios.nombre, calle1.nombre, sectores.nombre, direcciones.numero_civico) as descripcion"),
                DB::raw("CONCAT_WS('-', codigos_catastrales.sec, codigos_catastrales.man, codigos_catastrales.par, codigos_catastrales.sbp, codigos_catastrales.niv, codigos_catastrales.uni) as codigo_catastral")
            )
            ->join('codigos_catastrales', 'inmuebles.id', '=', 'codigos_catastrales.inmueble_id')
            ->join('propietarios', 'inmuebles.propietario_id', '=', 'propietarios.id')
            ->leftJoin('direcciones', 'inmuebles.id', '=', 'direcciones.inmueble_id')
            ->leftJoin('calles as calle1', 'direcciones.calle1_id', '=', 'calle1.id')
            ->leftJoin('calles as calle2', 'direcciones.calle2_id', '=', 'calle2.id')
            ->leftJoin('sectores', 'sectores.id', '=', 'direcciones.sector_id')
            ->whereNotIn('inmuebles.estado', ['INACTIVO', 'DIVISION INACTIVA', 'UNIFICACION INACTIVA']) // Excluir inmuebles inactivos y otros estados específicos
            ->when($request->search, function (Builder $query) use ($request) {
                $query->whereRaw("CONCAT_WS('', codigos_catastrales.sec, codigos_catastrales.man, codigos_catastrales.par, codigos_catastrales.sbp, codigos_catastrales.niv, codigos_catastrales.uni) LIKE ?", ["%{$request->search}%"])
                    ->orWhere('propietarios.nombre', 'like', "%{$request->search}%")
                    ->orWhere('propietarios.documento', 'like', "%{$request->search}%")
                    ->orWhere('sectores.nombre', 'like', "%{$request->search}%")
                    ->orWhere('calle1.nombre', 'like', "%{$request->search}%")
                    ->orWhere('calle2.nombre', 'like', "%{$request->search}%")
                    ->orWhere('direcciones.numero_civico', 'like', "%{$request->search}%");
            })
            ->orderBy('codigos_catastrales.sec', 'asc')
            ->orderBy('codigos_catastrales.man', 'asc')
            ->orderBy('codigos_catastrales.par', 'asc')
            ->orderBy('codigos_catastrales.sbp', 'asc')
            ->orderBy('codigos_catastrales.niv', 'asc')
            ->orderBy('codigos_catastrales.uni', 'asc')
            ->get();

        return response()->json($inmuebles);
    }
}
