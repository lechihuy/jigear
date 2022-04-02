<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Traits\Imaggable;
use App\Models\Traits\Sluggable;
use App\Models\Traits\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Catalog extends Model
{
    use HasFactory, Publishable, Sluggable, Imaggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'parent_id',
        'published',
        'description',
        'detail'
    ];

    /**
     * Get the catalog that owns to this catalog.
     */
    public function parent()
    {
        return $this->belongsTo(static::class);
    }

    /**
     * Get the products that belongs to this catalog.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
