<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $hidden = ['password'];

    protected $fillable = [
        'name',
        'email',
    ];
}
