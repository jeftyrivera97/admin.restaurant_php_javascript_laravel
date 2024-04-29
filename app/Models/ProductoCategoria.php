<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PintadoIngreso extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="producto_categorias"; //a
    protected $primaryKey = 'id';

  
    public function producto(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class);
    }
}
