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
            $query->dishes()->saveMany(factory(\App\Models\Dish::class, 5)->make());
        });
    }
}
