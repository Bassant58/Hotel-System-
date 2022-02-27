<?php

namespace Database\Factories;

use App\Models\Manager;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Manager::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        DB::table('roles')->pluck('');
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'password' => Hash::make('123456'),
            'national_id' => $this->faker->numerify('##############'),

        ];
    }
}
