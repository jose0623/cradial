<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $programas = [
            ['id' => 1, 'name' => 'AGRICOLA'],
            ['id' => 2, 'name' => 'DEPORTIVO'],
            ['id' => 3, 'name' => 'INFANTIL'],
            ['id' => 4, 'name' => 'JUVENIL'],
            ['id' => 5, 'name' => 'MAGAZZIN'],
            ['id' => 6, 'name' => 'MUSICAL'],
            ['id' => 7, 'name' => 'MUSICAL, VARIEDADES Y NOTICIERO AGRICOLA'],
            ['id' => 8, 'name' => 'NOTICIERO AGRICOLA'],
            ['id' => 9, 'name' => 'NOTICIERO NACIONAL'],
            ['id' => 10, 'name' => 'NOTICIERO REGIONAL'],
            ['id' => 11, 'name' => 'OPINION'],
            ['id' => 12, 'name' => 'RELIGIOSA'],
            ['id' => 13, 'name' => 'SECCION'],
            ['id' => 14, 'name' => 'VARIEDADES'],
            ['id' => 15, 'name' => 'VARIEDADES, MUSICA, NOTICIAS EN GENERAL'],
            ['id' => 16, 'name' => 'AMAS DE CASA'],           
        ];

        DB::table('tipo_programas')->insert($programas);
    }
}
