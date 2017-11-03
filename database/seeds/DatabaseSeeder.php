<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Restaurant::class, 10)->create()->each(function ($query) {
            $query->positions()->saveMany(factory(\App\Models\Position::class, 5)->make());
        });

        $positions = \App\Models\Position::query()->get();
        $positions->each(function ($query) {
            $query->dishes()->saveMany(factory(\App\Models\Dish::class, 3)->make());
        });
    }
}
