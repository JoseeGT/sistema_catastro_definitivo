<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;


    protected $fillable = [
        'titulo',
        'descripcion',
        'estado',
        'asignado_por_id',
        'asignado_a_id',
        'fecha_asignacion',
        'fecha_completada',
    ];
    public $timestamps = false;

    public function asignadoA()
{
    return $this->belongsTo(User::class, 'asignado_a_id');
}
}
