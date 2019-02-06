<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

/**
 * App\Place.
 *
 * @property int                                                  $id
 * @property string                                               $name
 * @property \Illuminate\Support\Carbon|null                      $created_at
 * @property \Illuminate\Support\Carbon|null                      $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\App\Item[] $items
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Place findSimilarSlugs($attribute, $config, $slug)
 */
class Place extends Model
{
    use Sluggable;

    protected $guarded = [];

    public function path()
    {
        return '/places/'.$this->slug;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }
}
