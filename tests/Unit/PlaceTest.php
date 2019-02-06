<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlaceTest extends TestCase
{
    use RefreshDatabase;

    public function test_has_a_path()
    {
        $place = factory('App\Place')->create();

        $this->assertEquals('/places/'.$place->slug, $place->path());
    }
}
