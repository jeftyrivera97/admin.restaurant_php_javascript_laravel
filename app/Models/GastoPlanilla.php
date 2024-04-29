<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GastoPlanilla extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table="gasto_planillas";
    protected $primaryKey = 'id'; 

    public function gasto()
    {
        return $this->belongsTo('App\Models\Gasto', 'id_gasto');
    }

    public function planilla()
    {
        return $this->belongsTo('App\Models\Planilla', 'id_planilla');
    }
}
