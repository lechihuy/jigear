<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Traits\Imaggable;
use App\Models\Traits\Sluggable;
use App\Models\Traits\Publishable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, Publishable, Sluggable, Imaggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'sku',
        'catalog_id',
        'unit_price',
        'stock',
        'published',
        'description',
        'detail',
        'parameters',
        'created_at',
    ];

    /**
     * Get the catalog that owns to this product.
     */
    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }

    /**
     * Get the brand that owns to this product.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeInStock($query)
    {
        return $query->where('stock', '>', 0);
    }

    protected function unitPriceText(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => option('currency') . number_format($attributes['unit_price'])
        );
    }

    public function relatedProducts()
    {
        return $this->where('catalog_id', $this->catalog_id)
            ->where('id', '!=', $this->id)->published()->inRandomOrder();
    }
}
