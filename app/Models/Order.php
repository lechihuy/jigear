<?php

namespace App\Models;

use App\Models\User;
use App\Models\Option;
use App\Models\OrderItem;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'customer_id',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            do {
                $code = 'JG-' . strtoupper(Str::random(10));
            } while (static::where('code', $code)->exists());
            $model->code = $code;
        });
    }

    /**
     * Get the order items that belongs to the order.
     * 
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the user that owns to the order.
     * 
     */
    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Calculate the bill of the order.
     * 
     * @param  array|null  $data
     * @return void
     */
    public function calculateBill($data = [])
    {
        $this->shipping_fee = $data['shipping_fee'] ?? Option::get('shipping_fee');
        $this->sub_total = $this->items->sum(function($items) {
            return $items['unit_price'] * $items['qty'];
        });

        $fees = collect([
            $this->shipping_fee, 
            $this->sub_total
        ]);
        
        $exemptions = collect([
            $this->discount
        ]);

        $this->total = $fees->sum() - $exemptions->sum();
    }

    /**
     * Ser the customer information of the order.
     * 
     * @param  array|null  $data
     * @return void
     */
    public function setCustomer($data = null)
    {
        if ($this->customer_id) {
            $this->first_name = $this->customer->first_name;
            $this->last_name = $this->customer->last_name;
            $this->gender = $this->customer->gender;
        }
    }
}
