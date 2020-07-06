<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleados extends Model
{
    use SoftDeletes;
    protected $table = 'empleados';
    protected $fillable = ['puesto_id','sexo_id','nombre','nivel_id', 'fecha_nacimiento','descripcion_global','foto'];
    protected $hidden = ['deleted_at','created_at','updated_at'];
    function getPuesto(){
        return  $this->belongsTo(Puesto::class,'puesto_id');
    }
    function getSexo(){
        return $this->belongsTo(Sexo::class,'sexo_id');
    }
    function getNivel(){
        return $this->belongsTo(Nivel::class,'nivel_id');
    }
}
