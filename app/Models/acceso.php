<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class acceso extends Authenticable
{
    use HasFactory;
    protected $table='acceso';
    protected $primaryKey = 'a_id';
    protected $guarded = ['a_id'];
    protected $fillable=[
        'a_email',
        'a_password',
        'a_tipo',
    ];

    public $timestamps = false;

    public function usuario(){
        return $this->hasOne(usuario::class, 'id_acc','a_id');
    }
}
