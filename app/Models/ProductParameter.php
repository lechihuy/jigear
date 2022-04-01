<?php

namespace App\Models;

use App\Models\ProductParameterSet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductParameter extends Model
{
    use HasFactory;

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['set'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
    ];

    /**
     * Get the product parameter set that owns this parameter.
     */
    public function set()
    {
        return $this->belongsTo(ProductParameterSet::class, 'product_parameter_set_id');
    }
}
