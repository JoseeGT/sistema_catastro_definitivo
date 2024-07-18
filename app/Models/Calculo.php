<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calculo extends Model
{
    use HasFactory;
    protected $guarded = [];
    

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }
}
