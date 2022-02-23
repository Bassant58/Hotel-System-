<?php

namespace Database\Factories;

use App\Models\Floor;
use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'capacity' => $this->faker->numberBetween(1, 6),
            'price' => $this->faker->numberBetween(100, 600),

            //////// Need To Be Fixed ,,,,, I don't Know 
            'manager_id' => Manager::factory(),
            'floor_id' => Floor::factory(),
            
        ];
    }
}
