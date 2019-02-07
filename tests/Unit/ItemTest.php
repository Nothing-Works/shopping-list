<?php

namespace Tests\Unit;

use App\Item;
use App\Place;
use Tests\TestCase;

class ItemTest extends TestCase
{
    /**
     * @var Item
     */
    protected $item;

    /**
     * @var Place
     */
    protected $place;

    protected function setUp()
    {
        parent::setUp();
        $this->place = factory(Place::class)->create();

        $this->item = factory(Item::class)->create(['place_id' => $this->place->id]);
    }

    public function test_it_has_a_place()
    {
        $this->assertInstanceOf(Place::class, $this->item->place);
    }

    public function test_it_can_toggle_completed_true()
    {
        $this->item->completed = true;

        $attribute = $this->item->toArray();

        $this->item->toggle(true);

        $this->assertDatabaseHas('items', $attribute);
    }

    public function test_it_can_toggle_completed_false()
    {
        $attribute = $this->item->toArray();

        $this->item->toggle(true);

        $this->item->toggle(false);

        $this->assertDatabaseHas('items', $attribute);
    }
}
