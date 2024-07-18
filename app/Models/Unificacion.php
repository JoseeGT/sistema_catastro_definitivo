<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unificacion extends Model
{
    use HasFactory;

    protected $fillable = ['lote_original_id', 'lote_unificado_id'];
    protected $table = 'unificaciones';
    public function loteOriginal()
    {
        return $this->belongsTo(Inmueble::class, 'lote_original_id');
    }   

    public function loteUnificado()
    {
        return $this->belongsTo(Inmueble::class, 'lote_unificado_id');
    }}
