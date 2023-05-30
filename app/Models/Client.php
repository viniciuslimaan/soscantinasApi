<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class Client extends Model
{
    protected $hidden = ['password'];

    protected $fillable = [
        'phone',
        'name',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
