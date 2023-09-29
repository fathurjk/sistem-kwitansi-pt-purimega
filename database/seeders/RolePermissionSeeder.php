<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$GK/JtUVYGFCZlHzVvpz33Ou4yyHeXNGmf84nJFlLwSyT0zB3FpcfC',
            'remember_token' => Str::random(10),
        ];
        DB::beginTransaction();
        try {
            // $super_admin = User::create(array_merge([
            //     'name' => 'Super Admin',
            //     'username' => 'superadmin',
            //     'email' => 'superadmin@gmail.com',
            // ], $default_user_value));

            // $admin_a = User::create(array_merge([
            //     'name' => 'Admin A',
            //     'username' => 'admina',
            //     'email' => 'admina@gmail.com',
            // ], $default_user_value));
    
            // $admin_b = User::create(array_merge([
            //     'name' => 'Admin B',
            //     'username' => 'adminb',
            //     'email' => 'adminb@gmail.com',
            // ], $default_user_value));
    
            $role_admin = Role::create(['name' => 'admin']);
            $role_super_admin = Role::create(['name' => 'super_admin']);
    
            $permission = Permission::create(['name' => 'super admin']);
            $permission = Permission::create(['name' => 'admin']);
            
            $role_admin->givePermissionTo('admin');
            $role_super_admin->givePermissionTo('super admin');
            $role_super_admin->givePermissionTo('admin');

            // $super_admin->assignRole('super_admin');
            // $admin_a->assignRole('admin');
            // $admin_b->assignRole('admin');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }

        
    }
}
