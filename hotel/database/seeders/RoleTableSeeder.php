<?php

namespace Database\Seeders;


use App\Models\Manager;
use App\Models\Receptionist;
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
                'name' => 'admin',
                'guard_name' => 'admin',

            ),
            1 =>
             array (
                'name' => 'manager',
                'guard_name' => 'manager',

            ),

            2 =>
             array (
                'name' => 'receptionist',
                'guard_name' => 'receptionist',

            ),

        ));
        $admin_id = DB::table('admins')->first();
        $admin_role = DB::table('roles')->where('name','admin')->pluck('id');
        DB::table('model_has_roles')->insert([
            'role_id' => $admin_role[0] ,
            'model_type' => 'App\Models\Admin',
            'model_id' => $admin_id -> id
        ]);

       $managers = Manager::factory(5)->create();
       foreach ($managers as $manager)
           $manager->assignRole('manager','manager');

        $receptionists = Receptionist::factory(5)->create();
        foreach ($receptionists as $receptionist)
            $receptionist->assignRole('receptionist','receptionist');
    }
}
