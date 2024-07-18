<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Pest\Laravel\call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(5)->create();

/*         User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
        $this->call(sectoresSeeder::class);
        $this->call(calles::class);
        $this->call(tenenciasSeeder::class);
        $this->call(TiposConstruccionSeeder::class);
        $this->call(RolesPermisos::class);
        $this->call(UsuariosSeeder::class);

    }
}
