<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $superAdmin=Role::create(['name' => 'Super-Admin']);
        $role1=Role::create(['name' => 'director']);
        $role2=Role::create(['name' => 'subdirector']);
        $role3=Role::create(['name' => 'funcionario']);
        $role4=Role::create(['name' => 'inspector']);

        Permission::create(['name' => 'ver propietarios']);
        Permission::create(['name' => 'crear propietarios']);
        Permission::create(['name' => 'editar propietarios']);

        Permission::create(['name' => 'ver inmuebles']);
        Permission::create(['name' => 'crear inmuebles']);
        Permission::create(['name' => 'editar inmuebles']);

        Permission::create(['name' => 'ver sectores-calles']);
        Permission::create(['name' => 'crear sectores-calles']);
        Permission::create(['name' => 'editar sectores-calles']);

        Permission::create(['name' => 'ver usuarios']);
        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'editar usuarios']);

        Permission::create(['name' => 'ver calculo']);
        Permission::create(['name' => 'crear calculo']);
        Permission::create(['name' => 'imprimir calculo']);
        
        Permission::create(['name' => 'imprimir reportes']);
        
        Permission::create(['name' => 'ver tareas']);
        Permission::create(['name' => 'crear tareas']);

        Permission::create(['name' => 'ver ficha-catastral']);
        Permission::create(['name' => 'crear ficha-catastral']);
        Permission::create(['name' => 'imprimir ficha-catastral']);

        Permission::create(['name' => 'ver inspecciones']);
        Permission::create(['name' => 'crear inspecciones']);

        Permission::create(['name' => 'ver auditoria']);

        Permission::create(['name' => 'ver division-unificacion']);

        Permission::create(['name' => 'ver respaldo']);
        

        $role1->givePermissionTo('ver propietarios');
        $role1->givePermissionTo('ver inmuebles');
        $role1->givePermissionTo('ver sectores-calles');
        $role1->givePermissionTo('ver usuarios');
        $role1->givePermissionTo('ver calculo');
        $role1->givePermissionTo('ver tareas');
        $role1->givePermissionTo('ver ficha-catastral');
        $role1->givePermissionTo('ver division-unificacion');

        $role2->givePermissionTo('ver propietarios');
        $role2->givePermissionTo('ver inmuebles');
        $role2->givePermissionTo('ver sectores-calles');
        $role2->givePermissionTo('ver usuarios');
        $role2->givePermissionTo('ver calculo');
        $role2->givePermissionTo('ver tareas');
        $role2->givePermissionTo('ver division-unificacion');

        $role3->givePermissionTo('ver inmuebles');
        $role3->givePermissionTo('ver propietarios');

        $role4->givePermissionTo('ver inmuebles');
        $role4->givePermissionTo('ver propietarios');
        $role4->givePermissionTo('ver inspecciones');

       
    }
}
