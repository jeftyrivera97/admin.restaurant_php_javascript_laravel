<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoCategoria extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table="empleado_categorias";
    protected $primaryKey = 'id';
   
    public function empleado(): HasMany
    {
        return $this->hasMany(Empleado::class);
    }
    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class);
    }
}
