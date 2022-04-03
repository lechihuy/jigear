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

    public function descendant()
    {
        return $this->children()->with('descendant');
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
            $query->whereIn('id', collect($this->getAllCatalogChain())->pluck('id')->all());
        });
    }

    public function topLevelParent() 
    {
        $parent = optional(static::find($this->id))->parent;

        do {
            if ($newParent = optional($parent)->parent) {
                $parent = $newParent;
            } else {
                break;
            }
        } while ($parent);

        return $parent ?? $this;
    }

    public function getAllCatalogChain()
    {
        $catalogs = [$this];

        foreach ($this->children as $child) {
            $catalogs = array_merge($catalogs, $child->getAllCatalogChain());
        }
        
        return $catalogs;
    }
}
