<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = new Faker();
        //\App\Models\User::factory(10)->create();
        \App\Models\Event::factory(20)->create()->each(function($event) use ($faker) {

            for( $i = 1; $i < 5; $i++) {
                \App\Models\Checkpoint::factory()->create([
                    'event_id' => $event->id,
                    'name' => $faker->create()->sentence(3),
                ]);

                \App\Models\Alert::factory()->create([
                    'event_id' => $event->id,
                    'original_alert_id' => $faker->create()->sentence(1),
                    'category' => ['Travel', 'Disaster', 'Health', 'Weather'][rand(0, 3)],
                    'name' => $faker->create()->sentence(3),
                    'body' => $faker->create()->sentence(15),
                    'location' => $faker->create()->sentence(3),
                    'latitude' => -34.397,
                    'longitude' => 150.644,
                    'start' => now(),
                    'end' => now()
                ]);

                \App\Models\Place::factory()->create([
                    'event_id' => $event->id,
                    'original_place_id' => $faker->create()->sentence(1),
                    'category' => ['Hotels', 'Hospitals', 'Restaurants'][rand(0, 2)],
                    'name' => $faker->create()->sentence(3),
                    'number' => $faker->create()->randomNumber(),
                    'location' => $faker->create()->sentence(3),
                    'latitude' => -34.397,
                    'longitude' => 150.644
                ]);
            }
        });
    }
}
