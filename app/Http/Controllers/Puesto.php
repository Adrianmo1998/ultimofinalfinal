<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use App\Models\Puesto as ModelPuesto;
use Illuminate\Http\Request;

class Puesto extends Controller
{
    function getPuestos(){
        $puestos = ModelPuesto::all();
        return view('vistas.puestos', compact('puestos'));
    }
    function getXPuesto(ModelPuesto $puesto){
        $nombre_puesto = $puesto->puesto;
        $empleados = $puesto->getEmpleados;
        return view('vistas.empsxpuesto', compact('empleados','nombre_puesto'));
    }
}
