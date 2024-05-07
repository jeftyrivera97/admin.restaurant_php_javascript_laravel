<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraDetalle extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table="compra_detalles"; 
    protected $primaryKey = 'id'; 

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'id_producto');
    }

    
    public function compra()
    {
        return $this->belongsTo('App\Models\Compra', 'id_compra');
    }
}
