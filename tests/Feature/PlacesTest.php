<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PlacesTest extends TestCase
{
    use RefreshDatabase,WithFaker;

    public function test_a_user_can_create_a_place()
    {
        $attributes = [
            'name' => 'andy song',
            'slug' => 'andy-song',
        ];

        $this->post('/places', $attributes)->assertRedirect('/places');

        $this->assertDatabaseHas('places', $attributes);

        $this->get('/places')->assertSee($attributes['name']);

        $this->get('/places')->assertSee($attributes['slug']);
    }

    public function test_a_user_can_view_a_place()
    {
        $place = factory('App\Place')->create();

        $this->get($place->path())->assertSee($place->name);
    }

    public function test_a_place_requires_a_name_min_3()
    {
        $array = [];
        for ($i = 0; $i < 3; ++$i) {
            $place = factory('App\Place')->raw(['name' => $i]);
            $array[$i] = $place;
        }

        foreach ($array as $attribute) {
            $this->post('/places', $attribute)->assertSessionHasErrors('name');
        }
    }
}
