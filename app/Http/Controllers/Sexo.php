<?php

namespace App\Http\Controllers;

use App\Models\Sexo as ModelSexo;
use Illuminate\Http\Request;

class Sexo extends Controller
{
    function getSexo(){
        $sexos = ModelSexo::all();
        return view('vistas.sexo', compact('sexos'));
    }
    function getXSexo(ModelSexo $sexo){
        $nombre_sexo = $sexo->sexo;
        $empleados = $sexo->getEmpleados;
        return view('vistas.empsxsexo', compact('empleados','nombre_sexo'));
    }
}
