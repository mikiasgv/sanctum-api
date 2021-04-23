<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'planner_id' => User::factory(),
            'original_id' => $this->faker->sentence(5),
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->sentence(15),
            'address' => $this->faker->address,
            'start'  =>  now(),
            'end'  =>  now(),
            'location'  =>  $this->faker->word,
            'latitude' => -34.397,
            'longitude' => 150.644,
            'status' => $this->faker->randomElement(['Test', 'Active', 'Closed', 'Archived'])
        ];
    }
}
