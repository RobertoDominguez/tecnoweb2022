<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
    use HasFactory;

    protected $table='asistencia';
    protected $primaryKey = 'a_id';
    protected $fillable = [
        "a_fec",
        "a_pres",
        "id_user",
        "id_rut",
    ];
    public $timestamps = false;
}
