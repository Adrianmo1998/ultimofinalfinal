<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nivel extends Model
{
    protected $table = 'nivel';
    protected $fillable = ['nivel', 'descripcion'];
    protected $hidden = ['created_at','updated_at'];
    function getEmpleados(){
        return $this->hasMany(Empleados::class);
    }
}
