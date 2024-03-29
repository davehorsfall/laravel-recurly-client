<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'author']);
        Role::create(['name' => 'user']);
    }
}
