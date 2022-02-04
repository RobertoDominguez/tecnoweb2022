<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mensualidad extends Model
{
    use HasFactory;

    protected $table='mensualidad';
    
    protected $primaryKey = 'm_id';

    protected $fillable=[
        'm_dur',
        'm_pre',
        'm_des',
    ];

    public $timestamps = false;

    public function nota_venta(){
        return $this->belongsTo(nota_venta::class, 'm_id','id_men');
    }
}
