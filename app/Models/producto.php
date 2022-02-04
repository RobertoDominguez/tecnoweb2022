<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    protected $table='producto';
    
    protected $primaryKey = 'p_id';

    protected $fillable=[
        'p_nom',
        'p_pre',
        'p_des',
        'p_stock',
        'id_entrenador',
    ];
    
    public $timestamps = false;

    public function usuario(){
        return $this->belongsTo(usuario::class, 'id_entrenador','u_id');
    }

}
