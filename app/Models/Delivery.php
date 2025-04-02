<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Delivery extends Model
{
    protected $fillable = ['order_id', 'customer_name', 'address', 'status'];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
