<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'admin',
                'guard_name' => 'admin',
    
            ),
            1 =>
             array (
                'id' => 2,
                'name' => 'manager',
                'guard_name' => 'manager',
    
            ),
    
            2 =>
             array (
                'id' => 3,
                'name' => 'receptionist',
                'guard_name' => 'receptionist',
    
            ),       
    
        ));
    }
}
