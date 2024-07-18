<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    use HasFactory;


    protected $fillable = [
        'estado',
        'inmueble_id',
        'fecha',
        'nota',
    ];
    public $timestamps = false;

    protected $table = 'inspecciones';
    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }
}
