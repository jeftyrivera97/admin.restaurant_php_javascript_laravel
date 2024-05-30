<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="empleados";
    protected $primaryKey = 'id';

    public function planilla(): HasMany
    {
        return $this->hasMany(Planilla::class);
    }
    public function estado(): BelongsTo
    {
        return $this->belongsTo('App\Models\Estado', 'id_estado');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\EmpleadoCategoria', 'id_categoria');
    }
}
