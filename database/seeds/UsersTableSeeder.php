<?php

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();
        
        $roles = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'permissions' => [
                    'user.view_list_project' => true,
                ]
            ],
            [
                'name' => 'Member',
                'slug' => 'member'
            ]
        ];
        
        foreach ($roles as $role) {
            Sentinel::getRoleRepository()->createModel()->fill($role)->save();
        }
        
        // Create user with admin-role
        $admin_data = [
            'email'          => 'ngthanh2093@gmail.com',
            'username'       => 'admin',
            'password'       => 'ng3thanh',
            'first_name'     => 'Admin',
            'last_name'      => 'System',
            'remember_token' => 1,
            'permissions'    => [
                'admin' => true,
            ]
        ];
        
        $admin = Sentinel::registerAndActivate($admin_data);
        $role = Sentinel::findRoleBySlug('admin');
        $role->users()->attach($admin);
    }
}
