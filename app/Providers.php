<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Providers extends Model
{
    //
    protected $table = 'providers';

    protected $fillable = [
        'name', 'email', 'cin', 'phone', 'address', 'city', 'status'
    ];
}
