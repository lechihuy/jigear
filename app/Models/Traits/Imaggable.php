<?php

namespace App\Models\Traits;

use App\Models\Image;

trait Imaggable
{
    /**
     * Get the one's images.
     */
    public function images()
    {
        return $this->morphMany(Image::class, 'imaggable');
    }

    /**
     * Get the one's thumbnail.
     */
    public function thumbnail()
    {
        return $this->morphOne(Image::class, 'imaggable')->where('type', 'thumbnail');
    }
}