<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inmueble extends Model
{
    use HasFactory;
    
    
    public $timestamps = false;

    protected $fillable = [
        'area_terreno',
        'area_construccion',
        'area_terreno_sd',
        'area_construccion_sd',
        'tenencia_terreno_id',
        'tipo_construccion_id',
        'propietario_id',
        'Lindero_norte',
        'Lindero_sur',
        'Lindero_este',
        'Lindero_oeste',
        'estado',
        'plano_path',
    ];

    public function codigoCatastral()
    {
        return $this->hasOne(CodigoCatastral::class);
    }

    public function tenenciaTerreno()
    {
        return $this->belongsTo(TenenciasTerreno::class);
    }

    public function propietario()
    {
        return $this->belongsTo(Propietario::class);
    }
    public function Documento()
    {
        return $this->hasOne(Documento::class);
    }
    public function TiposConstruccion()
    {
        return $this->belongsTo(TiposConstruccion::class);
    }
    public function direccion()
    {
        return $this->hasOne(Direccion::class);
    }
    public function tipoConstruccion()
    {
        return $this->belongsTo(TiposConstruccion::class);
    }
    public function calculo()
    {
        return $this->hasMany(Calculo::class);
    }
    public function setAttribute($key, $value)
    {
        if (is_string($value) && trim($value) === '') {
            $value = null;
        }

        return parent::setAttribute($key, $value);
    }

    public function ficha()
    {
        return $this->hasMany(Ficha::class);
}

    public function inspeccion()
    {
        return $this->hasMany(Inspeccion::class);
    }
}

