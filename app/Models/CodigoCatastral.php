<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodigoCatastral extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'codigos_catastrales';
    public $timestamps = false;

    public function inmueble()
    {
        return $this->belongsTo(Inmueble::class);
    }
    public function getCodigoCatastralAttribute()
    {
        return "{$this->sec} {$this->man} {$this->par} {$this->sbp} {$this->niv} {$this->uni}";
    }
    
}
