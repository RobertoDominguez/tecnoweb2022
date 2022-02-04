<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contador extends Model
{
    use HasFactory;
    protected $table='contador';
    protected $primaryKey = 'view';
    protected $fillable=[
        'count',
    ];

    public $timestamps = false;

}
