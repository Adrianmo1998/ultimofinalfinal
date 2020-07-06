<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Empleados;
use App\Models\Puesto as ModelPuesto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Puesto extends Controller
{
    function getPuestos(){
        $puestos = ModelPuestos::all();
        return response()->json($puestos);
    }
    function getInfopuestos(){
        $puestos = ModelPuestos::all('id', 'puesto');
       foreach ($puestos as $puesto){
           foreach ($puesto->getEmpleados as $emps){
               $emps->getSexo;
               $emps->getPuesto;
               $emps->getNivel;
           }
       }
        return response()->json($puestos);
    }
    function addEmpleado(Request $request){
        $rules = [
            'puesto_id' => 'required',
            'sexo' => 'required',
            'nombre' => 'required',
            'nivel_id' => 'required',
            'fecha_nacimiento' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        Empleados::create(
            [
                'puesto_id'=>intval($request->puesto_id),
                'sexo_id'=>intval($request->sexo),
                'nombre'=>$request->nombre,
                'nivel_id'=>intval($request->nivel_id),
                'fecha_nacimiento'=>$request->fecha_nacimiento,
                'descripcion_global'=>$request->descripcion_global,
            ]
        );
        return response()->json(["complete"=>true]);
    }
    function editEmpleado(Request $request){
        $rules = [
            'puesto_id' => 'required',
            'sexo' => 'required',
            'nombre' => 'required',
            'nivel_id' => 'required',
            'fecha_nacimiento' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }
        $empleado = Empleados::find($request->idEmpleado);
        $empleado->puesto_id= intval($request->puesto_id);
        $empleado->sexo_id=intval($request->sexo);
        $empleado->nombre=$request->nombre;
        $empleado->nivel_id=intval($request->nivel_id);
        $empleado->fecha_nacimiento=$request->fecha_nacimiento;
        $empleado->descripcion_global=$request->descripcion_global;
        if ($empleado->save()){
            return response()->json(["complete"=>true]);
        }
        return response()->json(["complete"=>false]);
    }
    function deleteEmpleado($id){
        $empleado = Empleados::find($id);
        $empleado->delete();
        return response()->json(["complete"=>true]);
    }
}
