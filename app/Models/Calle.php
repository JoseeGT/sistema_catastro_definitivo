<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calle extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public $timestamps = false;

    public function inmueble()
    {
        return $this->hasMany(inmueble::class);
    }
}
