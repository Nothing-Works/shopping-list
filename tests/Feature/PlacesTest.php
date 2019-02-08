<?php

namespace Tests\Feature;

use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class PlacesTest extends TestCase
{
    public function testAUserCanCreateAPlace()
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

    public function testAUserCanViewAPlace()
    {
        $place = factory('App\Place')->create();

        $this->get($place->path())->assertSee($place->name);
    }

    public function testAPlaceRequiresANameMin3()
    {
        $this->post('/places', factory('App\Place')->raw(['name' => null]))->assertSessionHasErrors('name');
    }
}
