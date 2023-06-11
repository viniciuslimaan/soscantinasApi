<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\PaymentMethod;
use App\Models\OpeningHours;
use App\Models\Product;
use App\Models\Order;

class User extends Authenticatable implements JWTSubject
{
    protected $hidden = ['password'];

    protected $fillable = [
        'cnpj',
        'name',
        'email',
        'password',
        'phone',
        'school_name'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

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
