<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="productos";
    protected $primaryKey = 'id';
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_usuario');
    }
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class,'id_estado');
    }
    public function Categoria()
    {
        return $this->belongsTo('App\Models\ProductoCategoria', 'id_categoria');
    }
   
}
