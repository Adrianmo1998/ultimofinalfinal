<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $table = 'puesto';
    protected $fillable = ['puesto','descripcion'];
    protected $hidden = ['created_at','updated_at'];

    function getEmpleados(){
        return $this->hasMany(Empleados::class);
    }

}
