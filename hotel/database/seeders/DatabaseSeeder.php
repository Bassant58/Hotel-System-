<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();


        \App\Models\Admin::factory()->create();
        \App\Models\Manager::factory(5)->create();
        \App\Models\Receptionist::factory(5)->create();
        \App\Models\User::factory(5)->create();
        \App\Models\Floor::factory(5)->create();
        \App\Models\Room::factory(5)->create();
        \App\Models\Reservation::factory(5)->create();

        $this->call([
            RoleTableSeeder::class,
        ]);
    }
}
