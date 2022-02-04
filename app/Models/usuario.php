<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;
    protected $table='usuario';
    
    protected $primaryKey = 'u_id';

    protected $fillable=[
        'u_ci',
        'u_nom',
        'u_app',
        'u_sex',
        'u_telf',
        'u_fecnac',
        'u_dir',
        'u_email',
        'id_entrenador',
        'id_acc',
    ];
    
    public $timestamps = false;

    public function acceso(){
        return $this->belongsTo(acceso::class, 'id_acc', 'a_id');
    }

    public function producto(){
        return $this->belongsTo(producto::class, 'u_id', 'id_entrenador');
    }

    public function nota_venta(){
        return $this->belongsTo(nota_venta::class, 'u_id', 'nv_id');    
    }

}
