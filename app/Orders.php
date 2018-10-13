<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    //
    protected $table = 'orders';

    protected $fillable = [
        'client_id', 'total'
    ];

    public function details()
    {
        return $this->hasMany('App\OrdersDetails');
    }
}
