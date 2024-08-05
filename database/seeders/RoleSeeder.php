<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;




class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);

        $role_editor = Role::create(['name' => 'editor']);

        //Permisos para roles
        $permission_create_role = Permission::create(['name' => 'create roles']);
        $permission_read_role = Permission::create(['name' => 'read roles']);
        $permission_update_role = Permission::create(['name' => 'update roles']);
        $permission_delete_role = Permission::create(['name' => 'delete roles']);

        //Permisos para "lessons"
        $permission_create_lesson = Permission::create(['name' => 'create lessons']);
        $permission_read_lesson = Permission::create(['name' => 'read lessons']);
        $permission_update_lesson = Permission::create(['name' => 'update lessons']);
        $permission_delete_lesson = Permission::create(['name' => 'delete lessons']);

        //Permisos para "category"
        $permission_create_category = Permission::create(['name' => 'create category']);
        $permission_read_category = Permission::create(['name' => 'read category']);
        $permission_update_category = Permission::create(['name' => 'update category']);
        $permission_delete_category = Permission::create(['name' => 'delete category']);

        $permissions_admin = [
            $permission_create_role,
            $permission_read_role,
            $permission_update_role,
            $permission_delete_role,
            $permission_create_lesson,
            $permission_read_lesson,
            $permission_update_lesson,
            $permission_delete_lesson,
            $permission_create_category,
            $permission_read_category,
            $permission_update_category,
            $permission_delete_category
        ];

        $permissions_editor = [
            $permission_create_lesson,
            $permission_read_lesson,
            $permission_update_lesson,
            $permission_delete_lesson,
            $permission_create_category,
            $permission_read_category,
            $permission_update_category,
            $permission_delete_category
        ];

        $role_admin->syncPermissions($permissions_admin);
        $role_editor->syncPermissions($permissions_editor);
    }
}
