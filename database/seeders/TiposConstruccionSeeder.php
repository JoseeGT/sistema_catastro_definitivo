<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposConstruccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipos_construccion')->insert([
            ['nombre' => 'casa', 'tasa1' => 0.0025, 'tasa2' => 0.7],
            ['nombre' => 'apartamento', 'tasa1' => 0.002, 'tasa2' => 0.84],
            ['nombre' => 'gm vivienda', 'tasa1' => 0.001, 'tasa2' => 0.84],
            ['nombre' => 'comercial Propio', 'tasa1' => 0.0055, 'tasa2' => 2.12],
            ['nombre' => 'comercial municipal', 'tasa1' => 0.0055, 'tasa2' => 1.98],
        ]);

    }
}
