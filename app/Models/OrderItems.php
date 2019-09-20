<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 *  Class OrderItems
 *
 *  @package    App\Models
 *  @author     Arslan Ali
 *  @email      marslan.ali@gmail.com
 */
class OrderItems extends Model
{

    /**
     * Get the images of Order's Items
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function image()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
