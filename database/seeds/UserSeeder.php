<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@domain.com',
            'password' => Hash::make('password')
        ]);

        $author = User::create([
            'name' => 'Author',
            'email' => 'author@domain.com',
            'password' => Hash::make('password')
        ]);
        
        $user = User::create([
            'name' => 'User',
            'email' => 'user@domain.com',
            'password' => Hash::make('password')
        ]);
        
        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
