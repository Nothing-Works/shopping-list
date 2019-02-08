<?php

namespace App;

use App\Filters\ItemFilters;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Item.
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item query()
 * @mixin \Eloquent
 * @property int                             $id
 * @property string                          $body
 * @property int                             $completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereUpdatedAt($value)
 * @property int        $place_id
 * @property \App\Place $place
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item wherePlaceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item filter($filters)
 */
class Item extends Model
{
    protected $guarded = [];

    public function toggle($completed)
    {
        $this->update(compact('completed'));
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    /**
     * @param $query
     * @param ItemFilters $filters
     *
     * @return mixed
     */
    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
