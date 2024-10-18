<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            ['id' => 1, 'name' => 'Amazonas', 'pais_id' => 1],
            ['id' => 2, 'name' => 'Antioquia', 'pais_id' => 1],
            ['id' => 3, 'name' => 'Atlántico', 'pais_id' => 1],
            ['id' => 4, 'name' => 'Bolívar', 'pais_id' => 1],
            ['id' => 5, 'name' => 'Boyacá', 'pais_id' => 1],
            ['id' => 6, 'name' => 'Caldas', 'pais_id' => 1],
            ['id' => 7, 'name' => 'Caquetá', 'pais_id' => 1],
            ['id' => 8, 'name' => 'Casanare', 'pais_id' => 1],
            ['id' => 9, 'name' => 'Cauca', 'pais_id' => 1],
            ['id' => 10, 'name' => 'Cesar', 'pais_id' => 1],
            ['id' => 11, 'name' => 'Chocó', 'pais_id' => 1],
            ['id' => 12, 'name' => 'Córdoba', 'pais_id' => 1],
            ['id' => 13, 'name' => 'Cundinamarca', 'pais_id' => 1],
            ['id' => 14, 'name' => 'Guaviare', 'pais_id' => 1],
            ['id' => 15, 'name' => 'Guainía', 'pais_id' => 1],
            ['id' => 16, 'name' => 'Huila', 'pais_id' => 1],
            ['id' => 17, 'name' => 'La Guajira', 'pais_id' => 1],
            ['id' => 18, 'name' => 'Magdalena', 'pais_id' => 1],
            ['id' => 19, 'name' => 'Meta', 'pais_id' => 1],
            ['id' => 20, 'name' => 'Nariño', 'pais_id' => 1],
            ['id' => 21, 'name' => 'Norte de Santander', 'pais_id' => 1],
            ['id' => 22, 'name' => 'Putumayo', 'pais_id' => 1],
            ['id' => 23, 'name' => 'Quindío', 'pais_id' => 1],
            ['id' => 24, 'name' => 'Risaralda', 'pais_id' => 1],
            ['id' => 25, 'name' => 'San Andrés y Providencia', 'pais_id' => 1],
            ['id' => 26, 'name' => 'Santander', 'pais_id' => 1],
            ['id' => 27, 'name' => 'Sucre', 'pais_id' => 1],
            ['id' => 28, 'name' => 'Tolima', 'pais_id' => 1],
            ['id' => 29, 'name' => 'Valle del Cauca', 'pais_id' => 1],
            ['id' => 30, 'name' => 'Vaupés', 'pais_id' => 1],
            ['id' => 31, 'name' => 'Vichada', 'pais_id' => 1],
        ];

        DB::table('estados')->insert($departamentos);
    }
}
