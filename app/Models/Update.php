<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table="updates";
    protected $primaryKey = 'id'; 

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'id_usuario');
    }
}
