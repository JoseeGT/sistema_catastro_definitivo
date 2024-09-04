<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $User=User::create([
            'name' => 'Luis Lopez',
            'email' => 'inspector@gmail.com',
            'password' => bcrypt('123456'),

        ]);
        
        $admin=User::create([
            'name' => 'José García',
            'email' => 'josecesarefraingarcia@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $admin->assignRole('Super-Admin');

        $User->assignRole('inspector');

    }
}
