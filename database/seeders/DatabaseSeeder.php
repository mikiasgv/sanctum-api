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
                    'category' => ['Weather', 'Health', 'Natural Disasters'][rand(0, 2)],
                    'name' => $faker->create()->sentence(3),
                    'location' => $faker->create()->sentence(3),
                    'start' => now(),
                    'end' => now()
                ]);
            }
        });
    }
}
