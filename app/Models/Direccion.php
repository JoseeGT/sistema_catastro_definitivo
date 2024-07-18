<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    use HasFactory;

    protected $guarded = [
    ];

    protected $table = 'direcciones';
    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
    public function calle1(){
        return $this->belongsTo(Calle::class);}
     public function calle2(){
            return $this->belongsTo(Calle::class);}

}
