<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->truncate();
        DB::table('roles')->truncate();
        DB::table('permissions')->truncate();
        DB::table('users_permissions')->truncate();
        DB::table('users_roles')->truncate();

        DB::table('permissions')->insert([
            [
                'name' => 'Create Post',
                'slug' => 'create-post'
            ],
            [
                'name' => 'Update Post',
                'slug' => 'update-post'
            ],
            [
                'name' => 'Delete Post',
                'slug' => 'delete-post'
            ],
        ]);

        DB::table('roles')->insert([
            [
                'name' => 'Admin',
                'slug' => 'admin'
            ],
            [
                'name' => 'Admod',
                'slug' => 'admod'
            ],
            [
                'name' => 'Writer',
                'slug' => 'writer'
            ],
        ]);

        $create_post_permission = Permission::where('slug','create-post')->first();
        $update_post_permission = Permission::where('slug', 'update-post')->first();
        $delete_post_permission = Permission::where('slug', 'delete-post')->first();

        $admin_role = Role::where('slug','admin')->first();

        $admin_role->permissions()->attach($create_post_permission);
        $admin_role->permissions()->attach($update_post_permission);
        $admin_role->permissions()->attach($delete_post_permission);



        $admod_role = Role::where('slug', 'admod')->first();
        $admod_role->permissions()->attach($create_post_permission);
        $admod_role->permissions()->attach($update_post_permission);



        $writer_role = Role::where('slug', 'writer')->first();
        $writer_role->permissions()->attach($update_post_permission);
//
        $admin_user = User::where('name', 'Admin')->first();
        $admod_user = User::where('name', 'Admod')->first();
        $writer_user = User::where('name', 'Writer')->first();

        $admin_user->roles()->attach($admin_role);
        $admod_user->roles()->attach($admod_role);
        $writer_user->roles()->attach($writer_role);
    }
}
