<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detalle_venta extends Model
{
    use HasFactory;

    protected $table='detalle_venta';
    
    protected $primaryKey = 'dv_id';

    protected $fillable=[
        'dv_cant',
        'dv_prev',
        'id_nv',
        'id_proy',
    ];

    public $timestamps = false;

    public function producto(){
        return $this->belongsTo(producto::class, 'id_proy', 'p_id');  
    }
}
