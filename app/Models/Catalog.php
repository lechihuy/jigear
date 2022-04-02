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
     * Get the catalog that owns to this catalog.
     */
    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    /**
     * Get the products that belongs to this catalog.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function allProducts()
    {
        return Product::published()->whereHas('catalog', function ($query) {
            $query->where('parent_id', $this->id)->orWhere('id', $this->id);
        });
    }

    public function topLevelParent($id = null) 
    {
        $parent = optional(static::find($id ?? $this->parent_id))->parent;
    
        while ($parent) {
            $parent = optional($parent)->parent;
        }
        
        return $parent ?? $this;
    }
}
