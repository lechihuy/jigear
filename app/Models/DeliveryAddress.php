<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'address',
        'phone_number',
        'is_default'
    ];

    /**
     * All of the relationships to be touched.
     *
     * @var array
     */
    protected $touches = ['customer'];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::saving(function ($model) {
            static::where('customer_id', $model->customer_id)->where('is_default', 1)->update([
                'is_default' => 0
            ]);
        });
    }

    /**
     * Get the customer that belongs to the delivery address.
     */
    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
