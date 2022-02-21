<?php

namespace App\Models\Traits;

use App\Models\Slug;
use Illuminate\Support\Facades\Validator;

trait Sluggable
{
    /**
     * Get the one's slug.
     */
    public function slug()
    {
        return $this->morphOne(Slug::class, 'sluggable');
    }

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function bootSluggable()
    {
        static::created(function ($model) {
            $model->slug()->create([
                'slug' => request()->slug
            ]);
        });

        static::updated(function ($model) {
            $model->slug()->update([
                'slug' => request()->slug
            ]);
        });
    }
}