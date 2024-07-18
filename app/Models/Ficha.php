<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    use HasFactory;


    protected $fillable = [
        'inmueble_id',
        'estado',
        'fecha',
    ];
    public $timestamps = false;


    protected $table = 'fichas';
    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }
}
