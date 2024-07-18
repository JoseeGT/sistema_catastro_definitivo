<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Propietario;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropietarioController extends Controller
{
    public function __invoke(Request $request): Collection
    {
        return Propietario::query()
        ->select('id', 'nombre', DB::raw("CONCAT(tipo_documento, ' ', documento) as descripcion"))
        ->where('propietarios.estado', '!=', 'INACTIVO') // Excluir propietarios inactivos
        ->when(
            $request->search,
            function (Builder $query) use ($request) {
                $search = $request->search;
                $query->where(function (Builder $query) use ($search) {
                    $query->where('nombre', 'like', "%$search%")
                          ->orWhere('documento', 'like', "%$search%")
                          ->orWhere('tipo_documento', 'like', "%$search%")
                          ->orWhere(DB::raw("CONCAT(tipo_documento, documento)"), 'like', "%$search%");
                });
            }
        )
        ->when(
            $request->exists('selected'),
            function (Builder $query) use ($request) {
                $query->whereIn('id', $request->input('selected', []));
                fn (Builder $query) => $query->limit(10);

            }
        )
        ->orderBy('nombre')
        ->get();
            
/*             ->map(function (Propietario $user) {
                $user->profile_image = "https://picsum.photos/300?id={$user->id}";

                return $user;
            }) */;
    }
}
