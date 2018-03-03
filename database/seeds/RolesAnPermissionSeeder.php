<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAnPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');

        Permission::create(['name'=>'users.index','title'=>'Navegar usuarios','description'=>'Lista todos los usuarios del sistema']);

        Permission::create(['name'=>'users.show','title'=>'Ver usuario','description'=>'Muestra información a detalle de usuario']);

        Permission::create(['name'=>'users.edit','title'=>'Edición de usuario','description'=>'Permite actualizar información de un usuario']);

        Permission::create(['name'=>'users.delete','title'=>'Eliminar usuario','description'=>'Permite eliminar cualquier usuario del sistema']);

        Permission::create(['name'=>'users.new','title'=>'Crear usuario','description'=>'Permite crear nuevo usuario del sistema']);


        Permission::create(['name'=>'roles.index','title'=>'Navegar roles','description'=>'Lista todos los roles del sistema']);

        Permission::create(['name'=>'roles.show','title'=>'Ver rol','description'=>'Muestra información a detalle del rol del sistema']);

        Permission::create(['name'=>'roles.edit','title'=>'Edición de rol','description'=>'Permite actualizar la información del rol']);

        Permission::create(['name'=>'roles.delete','title'=>'Eliminar rol','description'=>'Permite eliminar un rol del sistema']);
        Permission::create(['name'=>'roles.new','title'=>'Crear rol','description'=>'Permite crear un nuevo rol del sistema']);

		$role = Role::create(['name'=>'Administrador']);
        $role->syncPermissions(Permission::all());

		$role = Role::create(['name' => 'Usuario']);
		$role->givePermissionTo(['users.index','users.show','users.new','users.edit']);

		$role = Role::create(['name'=>'Supervisor']); 
		$role->givePermissionTo(['users.index','users.show']);
    }
}
