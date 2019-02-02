<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Place.
 *
 * @property int                                                  $id
 * @property string                                               $name
 * @property \Illuminate\Support\Carbon|null                      $created_at
 * @property \Illuminate\Support\Carbon|null                      $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Item[] $items
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Place extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
