<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reporte_horario extends Model
{
    use HasFactory;
    protected $table = 'reporte_horario';

    protected $primaryKey = 'rh_id';

    protected $fillable = [
        "rh_hini",
        "rh_hfin",
        "rh_des", //descripcion
        "id_asistencia",
    ];

    public $timestamps = false;
}
