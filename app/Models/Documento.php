<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    protected $fillable = ['inmueble_id', 
    'tipo_operacion', 
    'fecha', 
    'num', 
    'folio', 
    'protocolo', 
    'matricula', 
    'trimestre', 
    'observaciones'];

    protected $table = 'inmuebles_documentos';
    
    
    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }
}
