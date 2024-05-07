<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="compras";
    protected $primaryKey = 'id';

    public function EstadoCuenta()
    {
        return $this->belongsTo('App\Models\EstadoCuenta', 'id_estado_cuenta');
    }
    
    public function Estado()
    {
        return $this->belongsTo('App\Models\Estado', 'id_estado');
    }
    public function Cuenta()
    {
        return $this->belongsTo('App\Models\TipoCuenta', 'id_tipo_cuenta');
    }
    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor', 'id_proveedor');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Models\CompraCategoria', 'id_categoria');
    }

   

}
