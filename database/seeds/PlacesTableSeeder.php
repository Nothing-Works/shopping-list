<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        factory(App\Place::class, 3)->create()->each(function (\App\Place $place) {
            $place->items()->saveMany(factory(App\Item::class, 10)->make());
        });
    }
}
