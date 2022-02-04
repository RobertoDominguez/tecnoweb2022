<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rutina extends Model
{
    use HasFactory;

    protected $table='rutina';
    
    protected $primaryKey = 'r_id';

    protected $fillable=[
        "r_id",
        "r_nom",
        "r_mus",
        "r_dif",
        "r_des",
        "id_dias",
    ];
    
    public $timestamps = false;
}
