<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;

    public $timestamps = false;

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['order'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'order_id',
        'qty',
        'unit_price',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            $model->unit_price = Product::find($model->product_id)->unit_price ?? 0;
        });

        static::created(function ($model) {
            $model->product->update(['stock' => $model->product->stock - $model->qty]);
        });

        static::deleted(function ($model) {
            $model->product->update(['stock' => $model->product->stock + $model->qty]);
        });
    }

    /**
     * Get the product that belongs to the order item.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the order that belongs to the order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function addQuantity($qty)
    {
        $this->qty = $this->qty + $qty;
        $this->product->update(['stock' => $this->product->stock - $qty]);
        $this->save();
    }

    public function changeQuantity($qty)
    {
        $this->product->update(['stock' => $this->product->stock + $this->qty - $qty]);
        $this->qty = $qty;
        $this->save();
    }
}
