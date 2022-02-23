<?php

namespace Database\Factories;

use App\Models\Manager;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ReceptionistFactory extends Factory
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
            'email' => $this->faker->email(),
            'password' => Hash::make('123456'),
            'national_id' => $this->faker->numerify('##############'),
            'avatar' => 'avatar.png',
            'manager_id' => $this->faker->randomElement($manager_id),
        ];
    }
}
