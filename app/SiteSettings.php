<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    //
    protected $table = 'sitesettings';

    protected $fillable = [
        'namesetting', 'value', 'status'
    ];
}
