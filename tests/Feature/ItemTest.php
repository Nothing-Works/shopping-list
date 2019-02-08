<?php

namespace Tests\Feature;

use App\Item;
use App\Place;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class ItemTest extends TestCase
{
    public function test_Can_View_All_Items()
    {
        $place = factory(Place::class)->create();
        $item = factory(Item::class)->create(['place_id' => $place->id]);

        $this->get('/items')
            ->assertSee($item->body);
    }

    public function test_can_filter_by_tag()
    {
        $place1 = factory(Place::class)->create();
        $item1 = factory(Item::class)->create(['place_id' => $place1->id]);

        $place2 = factory(Place::class)->create();
        $item2 = factory(Item::class)->create(['place_id' => $place2->id]);

        $this->get('/items/'.$place1->slug)
            ->assertSee($item1->body);

        $this->get('/items/'.$place2->slug)
            ->assertSee($item2->body);
    }

    public function test_can_filter_place_name_by_query_string()
    {
        $place1 = factory(Place::class)->create();
        $item1 = factory(Item::class)->create(['place_id' => $place1->id]);

        $place2 = factory(Place::class)->create();
        $item2 = factory(Item::class)->create(['place_id' => $place2->id]);

        $this->get('/items?by='.$place1->name)
            ->assertSee($item1->body)
            ->assertDontSee($item2->body);

    }
}
