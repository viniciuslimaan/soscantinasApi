<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = [
        'id',
        'name',
        'status',
        'canceled_by',
        'client_id',
        'user_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items')
            ->using(OrderItem::class)
            ->withPivot(['quantity']);
    }
}
