<?php

namespace App\Filters;

use App\Place;

class ItemFilters extends Filter
{
    protected $filters=['by'];
    /**
     * @param $placeName
     *
     * @return mixed
     */
    protected function by($placeName)
    {
        $place = Place::where('name', $placeName)->firstOrFail();

        return $this->query->where('place_id', $place->id);
    }
}
