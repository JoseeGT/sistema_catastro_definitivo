<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Propietario;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UsuariosController extends Controller
{
    public function __invoke(Request $request): Collection
    {
        return User::query()
            ->select('id', 'name',         
                DB::raw("CONCAT(tipo_documento, ' ', documento) as descripcion"),
                // DB::raw("(SELECT name FROM roles WHERE id = role_id) as rol")

            )
            ->when(
                $request->search,
                fn (Builder $query) => $query
                    ->where('name', 'like', "%{$request->search}%")
                    ->orWhere('documento', 'like', "%{$request->search}%")
                    ->orWhere('tipo_documento', 'like', "%{$request->search}%")
                    ->orWhere(DB::raw("CONCAT(tipo_documento, documento)"), 'like', "%{$request->search}%"),
                    
            )
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),

            )
            ->orderBy('name')
            ->get();
            

    }
}
