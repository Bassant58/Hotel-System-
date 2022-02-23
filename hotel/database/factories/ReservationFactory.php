<?php

namespace Database\Factories;

use App\Models\Receptionist;
use App\Models\Room;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $room_id =  DB::table('rooms')->pluck('id');
        $user_id =  DB::table('users')->pluck('id');
        $receptionist_id = DB::table('receptionists')->pluck('id');
        return [

            'room_id' => $this->faker->randomElement($room_id),
            'user_id' => $this->faker->randomElement($user_id),
            'receptionist_id' => $this->faker->randomElement($receptionist_id),
        ];
    }
}
