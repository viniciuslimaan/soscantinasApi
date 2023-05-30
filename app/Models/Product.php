<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\User;

class Product extends Model
{
    protected $fillable = [
        'name',
        'type',
        'price',
        'old_price',
        'description',
        'photo',
        'quantity_day',
        'hidden',
        'user_id'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->using(OrderItem::class)
            ->withPivot(['quantity']);
    }
}
