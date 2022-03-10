<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Catalog;
use App\Models\Traits\Imaggable;
use App\Models\Traits\Sluggable;
use App\Models\Traits\Publishable;
use Illuminate\Database\Eloquent\Model;
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
        'purchasable',
        'description',
        'detail',
        'parameters'
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
}
