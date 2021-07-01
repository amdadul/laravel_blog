<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $RoleSuper = Role::create(['name' => 'SuperAdmin']);
        $RoleAdmin = Role::create(['name' => 'Admin']);
        $RoleEditor = Role::create(['name' => 'Editor']);
        $RoleUser = Role::create(['name' => 'User']);

        //permission_list as array
        $permissions = [
            'post.index',
            'post.create',
            'post.edit',
            'post.delete',
            'category.index',
            'category.create',
            'category.edit',
            'category.delete',
            'slider.index',
            'slider.create',
            'slider.edit',
            'slider.delete',
            'comments.index',
            'comments.create',
            'comments.edit',
            'comments.delete',
            'role.index',
            'role.create',
            'role.edit',
            'role.delete',
            'admin.index',
            'admin.create',
            'admin.edit',
            'admin.delete'
        ];
        for($i=0;$i< count($permissions);$i++)
        {
            $permission = Permission::create(['name' => $permissions[$i]]);

            $RoleSuper->givePermissionTo($permission);
            $permission->assignRole($RoleSuper);
        }
    }
}
