<?php

namespace Database\Factories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class FloorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $manager_id =  DB::table('managers')->pluck('id');
        return [
            'name' => $this->faker->name(),
            'floor_code' => $this->faker->numberBetween(1, 6),
            
            'manager_id' => $this->faker->randomElement($manager_id),
            
        ];
    }
}
