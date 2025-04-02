<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KitchenOrder extends Model
{
    protected $fillable = ['order_number', 'status', 'special_requests'];
}
