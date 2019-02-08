<?php

namespace Tests\Unit;

use App\Item;
use App\Place;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class PlaceTest extends TestCase
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
        $this->place = factory(Place::class)->create([]);
        $this->item = factory(Item::class, 10)->create(['place_id' => $this->place->id]);
    }

    public function testHasAPath()
    {
        $this->assertEquals('/places/'.$this->place->slug, $this->place->path());
    }

    public function testHasManyItems()
    {
        $this->assertContainsOnlyInstancesOf(Item::class, $this->place->items);
    }
}
