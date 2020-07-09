<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        /*=====================permissions==================================*/
        Permission::create(['name' => 'view animal health']);
        Permission::create(['name' => 'view amr']);
        Permission::create(['name' => 'view human health']);
        Permission::create(['name' => 'view resistance']);
        Permission::create(['name' => 'register users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);

       
       /*==========create roles and assign existing permissions=============*/

        /*==========================admin===================================*/

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleAdmin->givePermissionTo('register users');
        $roleAdmin->givePermissionTo('edit users');
        $roleAdmin->givePermissionTo('delete users');

        /*==========================guest===================================*/

        $roleGuest = Role::create(['name' => 'guest']);
        $roleGuest->givePermissionTo('view human health');
        $roleGuest->givePermissionTo('view animal health');

         /*==========================regular user===================================*/

        $roleRegularUser = Role::create(['name' => 'regular-user']);
        $roleRegularUser->givePermissionTo('view human health');
        $roleRegularUser->givePermissionTo('view animal health');
        $roleRegularUser->givePermissionTo('view amr');
        $roleRegularUser->givePermissionTo('view resistance');



      
    }
  }

