<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nota_venta extends Model
{
    use HasFactory;

    protected $table='nota_venta';
    
    protected $primaryKey = 'nv_id';

    protected $fillable=[
        'nv_fecha',
        'nv_monto',
        'id_men',
        'id_user',
    ];

    public $timestamps = false;

    public function mensualidad(){
        return $this->belongsTo(mensualidad::class, 'id_men', 'm_id');    
    }

    public function usuario(){
        return $this->belongsTo(usuario::class, 'id_user', 'u_id');    
    }



}
