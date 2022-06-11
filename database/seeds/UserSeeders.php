<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@gmail.com',
            'password'          => bcrypt('12345678'),
            'user_active'       => 1,
            'user_order'        => 1,
            'user_created_by'   => 1,
            'user_updated_by'   => 1
        ]);

        $admin->assignRole('Admin');

        $user = User::create([
            'name'              => 'User',
            'email'             => 'user@gmail.com',
            'password'          => bcrypt('12345678'),
            'user_active'       => 1,
            'user_order'        => 2,
            'user_created_by'   => 1,
            'user_updated_by'   => 1
        ]);

        $user->assignRole('User');
    }
}
