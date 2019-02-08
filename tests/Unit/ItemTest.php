<?php

namespace Tests\Unit;

use App\Item;
use App\Place;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
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

    public function testItHasAPlace()
    {
        $this->assertInstanceOf(Place::class, $this->item->place);
    }

    public function testItCanToggleCompletedTrue()
    {
        $this->item->completed = true;

        $attribute = $this->item->toArray();

        $this->item->toggle(true);

        $this->assertDatabaseHas('items', $attribute);
    }

    public function testItCanToggleCompletedFalse()
    {
        $attribute = $this->item->toArray();

        $this->item->toggle(true);

        $this->item->toggle(false);

        $this->assertDatabaseHas('items', $attribute);
    }
}
