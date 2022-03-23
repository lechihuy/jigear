<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'gender',
        'role',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function ($model) {
            if ($model->role === 'admin') {
                $model->email_verified_at = now();
            }
        });
    }

    /**
     * The fullname of the user.
     * 
     * @return string
     */
    public function getFullname() 
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    /**
     * Get the user's fullname.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->first_name.' '.$this->last_name,
        );
    }

    /**
     * Determine if the user is a admin.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function isAdmin(): Attribute
    {
        return new Attribute(
            get: fn () => $this->role === 'admin',
        );
    }

    /**
     * Determine if the user is a customer.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function isCustomer(): Attribute
    {
        return new Attribute(
            get: fn () => $this->role === 'customer',
        );
    }

    /**
     * Get gender label of the user.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function genderText(): Attribute
    {
        return new Attribute(
            get: fn () => match($this->gender) {
                '0' => __('Nam'),
                '1' => __('Nữ'),
                '2' => __('Khác')
            }
        );
    }

    /**
     * Get the delivery addresses that belongs to this user.
     */
    public function deliveryAddresses()
    {
        return $this->hasMany(DeliveryAddress::class, 'customer_id');
    }
}
