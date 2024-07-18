<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auditoria extends Model
{   
    use HasFactory;

    protected $table = 'auditoria';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'accion',
        'descripcion',
        'fecha',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
        
}
