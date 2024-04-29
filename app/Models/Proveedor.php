<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="proveedores";
    protected $primaryKey = 'id';

    public function compra(): HasMany
    {
        return $this->hasMany(Compra::class);
    }

    public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class);
    }


}
