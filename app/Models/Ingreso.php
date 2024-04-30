<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="ingresos";
    protected $primaryKey = 'id';

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function Categoria()
    {
        return $this->belongsTo('App\Models\IngresoCategoria', 'id_categoria');
    }

}
