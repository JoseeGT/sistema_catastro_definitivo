<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    use HasFactory;

    protected $fillable = ['lote_original_id', 'lote_dividido_id'];
    protected $table = 'divisiones';
    public function loteOriginal()
    {
        return $this->belongsTo(Inmueble::class, 'lote_original_id');
    }

    public function loteDividido()
    {
        return $this->belongsTo(Inmueble::class, 'lote_dividido_id');
    }
}
