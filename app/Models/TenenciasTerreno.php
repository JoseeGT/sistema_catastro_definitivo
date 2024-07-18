<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenenciasTerreno extends Model
{
    use HasFactory;

    protected $filable = [
        'nombre',
    ];

    protected $table = 'tenencias_terrenos';

    public function inmuebles()
    {
        return $this->hasMany(Inmueble::class);
    }
}
