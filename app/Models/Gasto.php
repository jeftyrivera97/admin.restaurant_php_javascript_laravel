<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="gastos";
    protected $primaryKey = 'id';
    protected $fillable = ['codigo_gasto','fecha','id_categoria','descripcion','total','id_usuario'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_usuario');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\GastoCategoria', 'id_categoria');
    }
}
