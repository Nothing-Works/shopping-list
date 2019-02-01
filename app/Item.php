<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Item
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $body
 * @property int $completed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCompleted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Item whereUpdatedAt($value)
 */
class Item extends Model
{

}
