<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $fillable = [
    'nombre',
    'tipo_documento',
    'documento', 
    'codigo_telefono', 
    'telefono', 
    'estado'];
    public $timestamps = false;

    public function inmuebles()
    {
        return $this->hasMany(Inmueble::class);
    }
}
