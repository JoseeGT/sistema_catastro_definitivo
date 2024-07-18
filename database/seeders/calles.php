<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class calles extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $calles = [
            'Calle 05 De Julio',
            'Calle 23 De Febrero',
            'Calle Bermúdez',    
            'Calle Bolívar',
            'Calle Campo Elías',
            'Calle Girardo',     
            'Calle Gran Demócrata',
            'Calle Miranda',
            'Calle Negro Primero',
            'Calle Plaza',
            'Calle Rivas Dávila',
            'Calle Rondón',
            'Calle Sucre',
            'Calle Tamanaco',
            'Calle Villapool',
            'Calle Zamora',
            'Callejón Centro I',
            'Callejón la Manguita',
            'Callejón los Tabasca',
            'Callejon los Tamarindo'
             
        ];
        foreach ($calles as $calle) {
            DB::table('calles')->insert(['nombre' => $calle]);
        }
    }
}
