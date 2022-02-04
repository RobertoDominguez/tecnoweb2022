<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ejercicio extends Model
{
    use HasFactory;

    protected $table = 'ejercicio';
    protected $primaryKey='e_id';
    protected $fillable = [
        "id_rutina",
        "e_nom",
        "e_serie",
        "e_rep",
    ];
    public $timestamps = false;
}
