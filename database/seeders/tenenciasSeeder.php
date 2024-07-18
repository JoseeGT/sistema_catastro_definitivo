<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tenenciasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tenencias = [
            'propio',
            'municipal',
            'inavi',
            'gobernacion',
            'intu'
        ];
        foreach ($tenencias as $tenencia) {
            DB::table('tenencias_terrenos')->insert(['nombre' => $tenencia]);
        }
    }
}
