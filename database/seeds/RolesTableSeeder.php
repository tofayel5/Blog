<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //for admin role
        DB::table('roles')->insert([
            'name'=>'Admin',
            'slug'=>'admin',
        ]);
        //for user role
        DB::table('roles')->insert([
            'name'=>'Author',
            'slug'=>'author',
        ]);
    }
}
