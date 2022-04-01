<?php

namespace App\Models\Traits;

use App\Models\Slug;
use Illuminate\Support\Str;
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
                'slug' => Str::slug(request()->slug ?? $model->title)
            ]);
        });

        static::updated(function ($model) {
            $model->slug->update([
                'slug' => Str::slug(request()->slug ?? $model->title)
            ]);
        });

        static::deleted(function ($model) {
            $model->slug->delete();
        });
    }
}