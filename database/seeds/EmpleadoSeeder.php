<?php

use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Empleados::create([
           'puesto_id'=>1,
           'sexo_id'=>2,
           'nombre'=>'Victoria',
           'nivel_id'=>1,
           'fecha_nacimiento'=>'2020-04-10',
           'descripcion_global'=>null,
           'foto'=>'foto-emp-1.jpg'
        ]);
        \App\Models\Empleados::create([
           'puesto_id'=>2,
           'sexo_id'=>1,
           'nombre'=>'Mahay',
           'nivel_id'=>1,
           'fecha_nacimiento'=>'2018-04-09',
           'descripcion_global'=>null,
           'foto'=>'foto-emp-2.jpg'
        ]);
        \App\Models\Empleados::create([
           'puesto_id'=>3,
           'sexo_id'=>1,
           'nombre'=>'Adan',
           'nivel_id'=>2,
           'fecha_nacimiento'=>'2016-04-12',
           'descripcion_global'=>null,
           'foto'=>'foto-emp-3.jpg'
        ]);
        \App\Models\Empleados::create([
           'puesto_id'=>4,
           'sexo_id'=>1,
           'nombre'=>'Pancho',
           'nivel_id'=>2,
           'fecha_nacimiento'=>'2017-04-10',
           'descripcion_global'=>null,
           'foto'=>'foto-emp-4.jpg'
        ]);
        \App\Models\Empleados::create([
           'puesto_id'=>5,
           'sexo_id'=>2,
           'nombre'=>'Sofia',
           'nivel_id'=>2,
           'fecha_nacimiento'=>'2015-11-11',
           'descripcion_global'=>null,
           'foto'=>'foto-emp-5.jpg'
        ]);
        \App\Models\Empleados::create([
           'puesto_id'=>2,
           'sexo_id'=>1,
           'nombre'=>'Pepe',
           'nivel_id'=>3,
           'fecha_nacimiento'=>'2014-04-10',
           'descripcion_global'=>null,
           'foto'=>'foto-emp-6.jpg'
        ]);
        \App\Models\Empleados::create([
           'puesto_id'=>3,
           'sexo_id'=>1,
           'nombre'=>'Armando',
           'nivel_id'=>3,
           'fecha_nacimiento'=>'2016-04-01',
           'descripcion_global'=>null,
           'foto'=>'foto-emp-7.jpg'
        ]);
        \App\Models\Empleados::create([
           'puesto_id'=>5,
           'sexo_id'=>2,
           'nombre'=> 'Pipo',
           'nivel_id'=>1,
           'fecha_nacimiento'=>'2015-04-02',
           'descripcion_global'=>null,
           'foto'=>'foto-emp-8.jpg'
        ]);
    }
}
