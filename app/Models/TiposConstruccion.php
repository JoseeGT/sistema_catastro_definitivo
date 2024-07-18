<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposConstruccion extends Model
{
    use HasFactory;


    protected $table = 'tipos_construccion';

public function inmuebles()
{
    return $this->belongsToMany(Inmueble::class);
}

}