<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresoCategoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="ingreso_categorias";
    protected $primaryKey = 'id'; 

    public function ingreso(): HasMany
    {
        return $this->hasMany(Ingreso::class);
    }
}
