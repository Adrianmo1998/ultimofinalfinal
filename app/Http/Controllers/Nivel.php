<?php

namespace App\Http\Controllers;

use App\Models\Nivel as ModelNivel;
use Illuminate\Http\Request;

class Nivel extends Controller
{
    function getNivel(){
        $nivel = ModelNivel::all();
        return view('vistas.nivel', compact('nivel'));
    }
    function getXNivel(ModelNivel $nivel){
        $nombre_nivel = $nivel->nivel;
        $empleados = $nivel->getEmpleados;
        return view('vistas.empsxnivel', compact('empleados','nombre_nivel'));
    }
}
