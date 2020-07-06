<?php

use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Sexo::create([
           'sexo'=>'Masculino',
           'descripcion'=>'Es un empleado'
        ]);

        \App\Models\Sexo::create([
           'sexo'=>'Femenino',
           'descripcion'=>'Es una empleada'
        ]);
    }
}
