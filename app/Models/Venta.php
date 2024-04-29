<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="ventas";
    protected $primaryKey = 'id';

    
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function categoria(): BelongsTo
    {
        return $this->belongsTo(VentaCategoria::class,'id_categoria');
    }

}
