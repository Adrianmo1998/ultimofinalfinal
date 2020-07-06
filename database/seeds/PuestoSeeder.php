<?php

use Illuminate\Database\Seeder;

class PuestoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Puesto::create([
            'puesto' => 'American Bully',
            'descripcion' => ''
        ]);

        \App\Models\Puesto::create([
            'puesto' => 'Shorkie',
            'descripcion' => ''
        ]);

        \App\Models\Puesto::create([
            'puesto' => 'Pincher Aleman',
            'descripcion' => ''
        ]);

        \App\Models\Puesto::create([
            'puesto' => 'Border Collie',
            'descripcion' => ''
        ]);

        \App\Models\Puesto::create([
            'puesto' => 'Bóxer ',
            'descripcion' => ''
        ]);
    }
}
