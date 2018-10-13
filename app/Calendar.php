<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    //

    protected $table = 'calendar';

    protected $fillable = [
        'date', 'title', 'desc'
    ];
}
