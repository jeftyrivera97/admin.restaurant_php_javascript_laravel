<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="estados";
    protected $primaryKey = 'id'; 

    public function proveedor(): HasMany
    {
        return $this->hasMany(Proveedor::class);
    }

    public function cliente(): HasMany
    {
        return $this->hasMany(Cliente::class);
    }

    public function empleado(): HasMany
    {
        return $this->hasMany(Empleado::class);
    }
    public function compraCategoria(): HasMany
    {
        return $this->hasMany(CompraCategoria::class);
    }
    public function gastoCategoria(): HasMany
    {
        return $this->hasMany(GastoCategoria::class);
    }
    public function producto(): HasMany
    {
        return $this->hasMany(Producto::class);
    }
    public function productoCategoria(): HasMany
    {
        return $this->hasMany(ProductoCategoria::class);
    }
    public function ventaCategoria(): HasMany
    {
        return $this->hasMany(VentaCategoria::class);
    }
}
