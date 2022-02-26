<?php

namespace Database\Factories;

use App\Models\Floor;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $manager_id =  DB::table('managers')->pluck('id');
        $floor_id =  DB::table('floors')->pluck('id');


        return [

            'capacity' => $this->faker->numberBetween(1, 6),
            'price' => $this->faker->numberBetween(100, 1000),
            'manager_id' => $this->faker->randomElement($manager_id),
            'floor_id' => $this->faker->randomElement($floor_id),
            'room_code' => $this->faker->numberBetween(1111,9999)
            
        ];
    }
}
