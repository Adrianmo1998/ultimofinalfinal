<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sexo extends Model
{
    protected $table = 'sexo';
    protected $fillable = ['sexo', 'descripcion'];
    protected $hidden = ['created_at','updated_at'];
    function getEmpleados(){
        return $this->hasMany(Empleados::class);
    }
}
