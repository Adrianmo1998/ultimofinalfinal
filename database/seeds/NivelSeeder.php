<?php

use Illuminate\Database\Seeder;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Nivel::create([
           'nivel'=>'Junior',
           'descripcion'=>'Poco experimentado'
        ]);

        \App\Models\Nivel::create([
           'nivel'=>'Senior',
           'descripcion'=>'Experimentado'
        ]);

        \App\Models\Nivel::create([
           'nivel'=>'Master',
           'descripcion'=>'Muy experimentado'
        ]);
    }
}
