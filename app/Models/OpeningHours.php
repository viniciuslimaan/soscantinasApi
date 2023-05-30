<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class OpeningHours extends Model
{
    protected $fillable = [
        'week_days',
        'time_start',
        'time_end',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
