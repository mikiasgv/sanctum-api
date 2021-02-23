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
        $faker = Faker::create();
        //\App\Models\User::factory(10)->create();
        \App\Models\Event::factory(20)->create()->each(function($event) use ($faker) {
            // factory(App\Employee::class, 10)->create([
            //     'pid' => $position->id
            // ]);
            \App\Models\Checkpoint::factory(5)->create([
                'event_id' => $event->id,
                'name' => $faker->sentence(3),
            ]);
        });
    }
}
