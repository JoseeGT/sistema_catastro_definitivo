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
            'name' => 'inspector',
            'email' => 'inspector@ins',
            'password' => bcrypt('123456'),

        ]);
        
        $admin=User::create([
            'name' => 'admin',
            'email' => 'admin@admin',
            'password' => bcrypt('123456'),
        ]);
        $admin->assignRole('Super-Admin');

        $User->assignRole('inspector');

    }
}
