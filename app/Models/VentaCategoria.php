<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaCategoria extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="venta_categorias";
    protected $primaryKey = 'id'; 

    public function venta(): HasMany
    {
        return $this->hasMany(Venta::class);
    }
}
