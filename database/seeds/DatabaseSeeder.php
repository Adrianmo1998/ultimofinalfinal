<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Eliminar los datos de todas las tablas
        $this->truncateTable(['empleados', 'nivel', 'puesto','sexo']);
        $this->call(SexoSeeder::class);
        $this->call(PuestoSeeder::class);
        $this->call(NivelSeeder::class);
        $this->call(EmpleadoSeeder::class);
    }
    protected function truncateTable(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        foreach ($tables as $table){
            DB::table($table)->truncate();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
