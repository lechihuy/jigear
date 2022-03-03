<?php

namespace App\Models;

use App\Models\ProductParameter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductParameterSet extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'key',
    ];

    /**
     * Get the parameters that belongs to this parameter set.
     */
    public function parameters()
    {
        return $this->hasMany(ProductParameter::class);
    }
}
