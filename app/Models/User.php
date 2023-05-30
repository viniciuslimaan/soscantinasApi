<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PaymentMethod;
use App\Models\OpeningHours;
use App\Models\Product;
use App\Models\Order;

class User extends Model
{
    protected $hidden = ['password'];

    protected $fillable = [
        'cnpj',
        'name',
        'email',
        'phone',
        'school_name'
    ];

    public function payment_methods()
    {
        return $this->hasMany(PaymentMethod::class);
    }

    public function opening_hours()
    {
        return $this->hasMany(OpeningHours::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
