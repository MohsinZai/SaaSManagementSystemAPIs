<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]
                    ->forgetCachedPermissions();
        // Super Admin
        $addUser = 'add user';
        $editUser = 'edit user';
        $deleteUser = 'delete user';
        $viewUser = 'view user';
        $approveUser = 'approve user';
        $suspendUser = 'suspend user';

        $addAgent = 'add agent';
        $editAgent = 'edit agent';
        $deleteAgent = 'delete agent';
        $viewAgent = 'view agent';
        $approveAgent = 'approve agent';
        $suspendAgent = 'suspend agent';

        $addProduct = 'add product';
        $editProduct = 'edit product';
        $deleteProduct = 'delete product';
        $viewProduct = 'view product';
        $approveProduct = 'approve product';
        $suspendProduct = 'suspend product';


        //Approval Permissions
        Permission::create(['name'=> $approveUser]); 
        Permission::create(['name' => $suspendUser]);
        Permission::create(['name'=> $approveAgent]); 
        Permission::create(['name' => $suspendAgent]);
        Permission::create(['name'=> $approveProduct]); 
        Permission::create(['name' => $suspendProduct]);

        //Permissions For User
        Permission::create(['name' => $addUser]);
        Permission::create(['name'=> $editUser]); 
        Permission::create(['name' => $deleteUser]);
        Permission::create(['name' => $viewUser]);
        
        //Permissions For Agent
        Permission::create(['name' => $addAgent]);
        Permission::create(['name'=> $editAgent]); 
        Permission::create(['name' => $deleteAgent]);
        Permission::create(['name' => $viewAgent]);
        
        //Permissions For Product
        Permission::create(['name' => $addProduct]);
        Permission::create(['name'=> $editProduct]); 
        Permission::create(['name' => $deleteProduct]);
        Permission::create(['name' => $viewProduct]);
        
        //Define Roles Available
        $superAdmin = 'super-admin';
        $agent = 'agent';
        $user = 'user';

        Role::create(['name' => $superAdmin])
                ->givePermissionTo(Permission::all());
        
        Role::create(['name' => $agent])
                ->givePermissionTo([
                    $addUser,
                    $editUser,
                    $deleteUser,
                    $viewUser,
                    $addAgent,
                    $editAgent,
                    $deleteAgent,
                    $viewAgent,
                    $addProduct,
                    $editProduct,
                    $deleteProduct,
                    $viewProduct,
                ]);

        Role::create(['name' => $user])
                ->givePermissionTo([
                    $addUser,
                    $editUser,
                    $deleteUser,
                    $viewUser,
                    $viewAgent,
                    $viewProduct,
                ]);           
    }
}