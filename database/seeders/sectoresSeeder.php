<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class sectoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectores = [
            'Centro, Palo Negro',
            'Ocumarito, Palo Negro',
             
        ];
        foreach ($sectores as $sector) {
            DB::table('sectores')->insert(['nombre' => $sector]);
        }
    }
}
