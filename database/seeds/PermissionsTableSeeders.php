<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;


class PermissionsTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Lista de permisos
        $permission = Permission::create(['name' => 'home']);

        $permission = Permission::create(['name' => 'files.index']);
        $permission = Permission::create(['name' => 'files.create']);
        $permission = Permission::create(['name' => 'files.form']);

        $permission = Permission::create(['name' => 'empresa.index']);
        $permission = Permission::create(['name' => 'empresa.create']);
        $permission = Permission::create(['name' => 'empresa.edit']);
        $permission = Permission::create(['name' => 'empresa.destroy']);

        $permission = Permission::create(['name' => 'evento.index']);
        $permission = Permission::create(['name' => 'evento.create']);
        $permission = Permission::create(['name' => 'evento.edit']);
        $permission = Permission::create(['name' => 'evento.destroy']);

        $permission = Permission::create(['name' => 'paquete.index']);
        $permission = Permission::create(['name' => 'paquete.create']);
        $permission = Permission::create(['name' => 'paquete.edit']);
        $permission = Permission::create(['name' => 'paquete.destroy']);

        $permission = Permission::create(['name' => 'categoria.index']);
        $permission = Permission::create(['name' => 'categoria.create']);
        $permission = Permission::create(['name' => 'categoria.edit']);
        $permission = Permission::create(['name' => 'categoria.destroy']);

        $permission = Permission::create(['name' => 'subcategoria.index']);
        $permission = Permission::create(['name' => 'subcategoria.create']);
        $permission = Permission::create(['name' => 'subcategoria.edit']);
        $permission = Permission::create(['name' => 'subcategoria.destroy']);

        $permission = Permission::create(['name' => 'institucion.index']);
        $permission = Permission::create(['name' => 'institucion.create']);
        $permission = Permission::create(['name' => 'institucion.edit']);
        $permission = Permission::create(['name' => 'institucion.destroy']);

        $permission = Permission::create(['name' => 'zona.index']);
        $permission = Permission::create(['name' => 'zona.create']);
        $permission = Permission::create(['name' => 'zona.edit']);
        $permission = Permission::create(['name' => 'zona.destroy']);

        $permission = Permission::create(['name' => 'seccion.index']);
        $permission = Permission::create(['name' => 'seccion.create']);
        $permission = Permission::create(['name' => 'seccion.edit']);
        $permission = Permission::create(['name' => 'seccion.destroy']);

        //$permission = Permission::create(['name' => 'config.conf']);


        //Lista de roles
        $admin = Role::create(['name' => 'Admin']);
        $user =  Role::create(['name' => 'User']);


        $admin->syncPermissions([
            //Permisos par pagina de Dashboard
            'home',

            //Permisos totales de Galeria (files)
            'files.index',
            'files.create',
            'files.form',
            //Permisos totales de empresas
            'empresa.index',
            'empresa.create',
            'empresa.edit',
            'empresa.destroy',
            //Permisos totales de eventos
            'evento.index',
            'evento.create',
            'evento.edit',
            'evento.destroy',
            //Permisos totales de paquetes
            'paquete.index',
            'paquete.create',
            'paquete.edit',
            'paquete.destroy',
            //permisos totales de categoria
            'categoria.index',
            'categoria.create',
            'categoria.edit',
            'categoria.destroy',
            //permisos totales de subctaegoria
            'subcategoria.index',
            'subcategoria.create',
            'subcategoria.edit',
            'subcategoria.destroy',
            //permisos totales de instituciones
            'institucion.index',
            'institucion.create',
            'institucion.edit',
            'institucion.destroy',
            //permisos totales de Zona
            'zona.index',
            'zona.create',
            'zona.edit',
            'zona.destroy',
            //permisos totales de Seccion
            'seccion.index',
            'seccion.create',
            'seccion.edit',
            'seccion.destroy',

            //Permisos par pagina de configuracion
            //'config.conf',

        ]);

        $user->syncPermissions([
            'empresa.index',
            'empresa.create',
            'empresa.edit',
            'empresa.destroy',
        ]);

        //Usuario administrador
        $user = User::find(1);
        $user->assignRole('Admin');

        /*Usuarios normales
        $userA = User::find(2);
        $userA->assignRole('User');
        /*
        $userB = User::find(3);
        $userB->assignRole('User');

        $userC = User::find(4);
        $userC->assignRole('User');

        $userD = User::find(5);
        $userD->assignRole('User');

        $userE = User::find(5);
        $userE->assignRole('User');

        $userF = User::find(6);
        $userF->assignRole('User');*/
    }
}
